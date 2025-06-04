<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'Edit Pdf'); ?>
<?php $__env->startSection('page_name', 'Edit Pdf'); ?>
<?php $__env->startSection('content'); ?>
 <style>
    #pdf-canvas {
      border: 1px solid #ccc;
      cursor: crosshair;
    }
    .overlay {
      position: absolute;
      font-weight: bold;
      pointer-events: none;
    }
    #wrapper {
      position: relative;
      display: inline-block;
    }
    #nav-buttons {
      margin-top: 10px;
    }
  </style>
<!-- Content wrapper -->
<div class="content-wrapper">
    
    <div class="container m-0">
        <div class="row px-2">

        </div>
    </div>
    
    <div class="container-xxl flex-grow-1 container mt-2">
        <!-- Layout Demo -->
        <div class="row">
            <section class='hero_section'>
                <div class="col-12 text-center">
                    <div class="spacer_parent">
                        <div class="spacer_line"></div>
                    </div>

                </div>
            </section>
            <section>
                <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="container pt-4 login_box bg-lavender text-dark ">
                        <div class="row justify-content-center ">
                                <!-- Login Form -->
                                <div id="student_register_form" class="">
                                    <h3 class="text-center p-1 login_h3">Evaluate Pdf</h3>
                                    <?php echo $__env->make('frontend.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <h2>PDF Annotator</h2>
                                        <input type="file" id="pdf-upload" accept="application/pdf">
                                        <br><br>

                                        <div id="wrapper">
                                        <canvas id="pdf-canvas"></canvas>
                                        </div>

                                        <div id="nav-buttons">
                                        <button id="prev-page">Previous Page</button>
                                        <button id="next-page">Next Page</button>
                                        <span>Page: <span id="page-num">0</span> / <span id="page-count">0</span></span>
                                        </div>

                                        <br>
                                        <button id="toggle-mode">Switch to Text Mode</button>
                                        <button id="download-pdf">Download Annotated PDF</button>
                                        <br><br>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            </section>
        </div>
        <!--/ Layout Demo -->
    </div>
    <!-- / Content -->
    <div class="content-backdrop fade"></div>
</div>
          <!-- Content wrapper -->
        </div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<!-- PDF.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.min.js"></script>
<!-- PDF-lib -->
<script src="https://unpkg.com/pdf-lib@1.17.1/dist/pdf-lib.min.js"></script>

 <script>
  const canvas = document.getElementById('pdf-canvas');
  const ctx = canvas.getContext('2d');
  const wrapper = document.getElementById('wrapper');

  let pdf = null;
  let currentPage = 1;
  let totalPages = 0;
  let scale = 1.5;
  let scores = [];
  let textAnnotations = [];
  let mode = 'score';

  document.getElementById('pdf-upload').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file.type !== "application/pdf") {
      alert("Please upload a valid PDF file.");
      return;
    }

    const fileReader = new FileReader();
    fileReader.onload = function() {
      const typedarray = new Uint8Array(this.result);
      pdfjsLib.getDocument(typedarray).promise.then(function(pdfDoc_) {
        pdf = pdfDoc_;
        totalPages = pdf.numPages;
        document.getElementById('page-count').textContent = totalPages;
        currentPage = 1;
        renderPage(currentPage);
      });
    };
    fileReader.readAsArrayBuffer(file);
  });

  function renderPage(num) {
    pdf.getPage(num).then(function(page) {
      const viewport = page.getViewport({ scale: scale });
      canvas.height = viewport.height;
      canvas.width = viewport.width;

      const renderContext = {
        canvasContext: ctx,
        viewport: viewport
      };

      page.render(renderContext).promise.then(function() {
        document.getElementById('page-num').textContent = currentPage;
        wrapper.querySelectorAll('.overlay').forEach(el => el.remove());
        scores.filter(s => s.page === currentPage).forEach(drawOverlay);
        textAnnotations.filter(t => t.page === currentPage).forEach(drawTextOverlay);
      });
    });
  }

  document.getElementById('prev-page').addEventListener('click', function() {
    if (currentPage <= 1) return;
    currentPage--;
    renderPage(currentPage);
  });

  document.getElementById('next-page').addEventListener('click', function() {
    if (currentPage >= totalPages) return;
    currentPage++;
    renderPage(currentPage);
  });

  document.getElementById('toggle-mode').addEventListener('click', function() {
    if (mode === 'score') {
      mode = 'text';
      this.textContent = "Switch to Score Mode";
    } else {
      mode = 'score';
      this.textContent = "Switch to Text Mode";
    }
  });

  let longPressTimer;
  let isLongPress = false;

  canvas.addEventListener("mousedown", function(e) {
    isLongPress = false;
    longPressTimer = setTimeout(() => {
      isLongPress = true;
      if (mode === 'score') recordScore(e, 0);
    }, 800);
  });

  canvas.addEventListener("mouseup", function(e) {
    clearTimeout(longPressTimer);
  });

  canvas.addEventListener("click", function(e) {
    if (isLongPress) return;

    const pos = getMousePos(e);
    if (mode === 'text') {
      const inputText = prompt("Enter text:");
      if (inputText) {
        textAnnotations.push({
          page: currentPage,
          x: pos.x,
          y: pos.y,
          text: inputText
        });
        drawTextOverlay({ x: pos.x, y: pos.y, text: inputText });
      }
      return;
    }

    // Incremental scoring
    recordScore(e, 1);
  });

  function getMousePos(event) {
    const rect = canvas.getBoundingClientRect();
    return {
      x: (event.clientX - rect.left),
      y: (event.clientY - rect.top)
    };
  }

  function recordScore(event, scoreInput) {
    const pos = getMousePos(event);
    const threshold = 15;

    const existing = scores.find(s =>
      s.page === currentPage &&
      Math.abs(s.x - pos.x) < threshold &&
      Math.abs(s.y - pos.y) < threshold
    );

    if (existing) {
      if (scoreInput === 0) {
        existing.score = 0;
      } else {
        existing.score = Math.min(existing.score + 1, 10);
      }
    } else {
      scores.push({
        page: currentPage,
        x: pos.x,
        y: pos.y,
        score: scoreInput
      });
    }

    wrapper.querySelectorAll('.overlay').forEach(el => el.remove());
    scores.filter(s => s.page === currentPage).forEach(drawOverlay);
    textAnnotations.filter(t => t.page === currentPage).forEach(drawTextOverlay);
  }

  function drawOverlay({ x, y, score }) {
    const div = document.createElement('div');
    div.className = 'overlay';
    div.style.left = (canvas.offsetLeft + x - 10) + 'px';
    div.style.top = (canvas.offsetTop + y - 10) + 'px';
    div.style.color = 'red';
    div.innerHTML = `${score} <span style="color:green;">✔</span>`;
    wrapper.appendChild(div);
  }

  function drawTextOverlay({ x, y, text }) {
    const div = document.createElement('div');
    div.className = 'overlay';
    div.style.left = (canvas.offsetLeft + x) + 'px';
    div.style.top = (canvas.offsetTop + y - 10) + 'px';
    div.style.color = 'blue';
    div.style.transform = "translateX(-50%)"; // center align
    div.textContent = text;
    wrapper.appendChild(div);
  }

  document.getElementById('download-pdf').addEventListener('click', async function () {
    if (!pdf) {
      alert("Please load a PDF first.");
      return;
    }

    const fileInput = document.getElementById('pdf-upload');
    const originalPdfBytes = await fileInput.files[0].arrayBuffer();
    const pdfDoc = await PDFLib.PDFDocument.load(originalPdfBytes);
    const pages = pdfDoc.getPages();
    const font = await pdfDoc.embedFont(PDFLib.StandardFonts.HelveticaBold);

    let totalScore = 0;

    scores.forEach(({ page, x, y, score }) => {
      const p = pages[page - 1];
      const { height } = p.getSize();
      p.drawText(String(score) + " ✔", {
        x: x,
        y: height - y,
        size: 14,
        color: PDFLib.rgb(1, 0, 0),
        font: font
      });
      totalScore += parseInt(score);
    });

    textAnnotations.forEach(({ page, x, y, text }) => {
      const p = pages[page - 1];
      const { height } = p.getSize();
      p.drawText(text, {
        x: x - (font.widthOfTextAtSize(text, 12) / 2),
        y: height - y,
        size: 12,
        color: PDFLib.rgb(0, 0, 1),
        font: font
      });
    });

    const lastPage = pages[pages.length - 1];
    lastPage.drawText("Total Score: " + totalScore, {
      x: 50,
      y: 50,
      size: 16,
      color: PDFLib.rgb(0, 0.5, 0),
      font: font
    });

    const pdfBytes = await pdfDoc.save();
    const blob = new Blob([pdfBytes], { type: 'application/pdf' });
    const link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    link.download = "annotated.pdf";
    link.click();
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\exam_system\resources\views/frontend/pdf_edit_demo/index.blade.php ENDPATH**/ ?>