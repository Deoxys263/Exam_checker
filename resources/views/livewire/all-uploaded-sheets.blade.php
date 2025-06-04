<div>
    <input type="text" wire:model="search" placeholder="Search..." class="mb-4 p-2 border border-gray-300">

    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class=" px-4 py-3">
                    Name
                </th>
                <th class=" px-4 py-3">
                    Package
                </th>
                <th class=" px-4 py-3">
                    Paper Name
                </th>
            </tr>
        </thead>
        <tbody>
            @if (isset($sheets) && count($sheets))
                @foreach ($sheets as $sheet)
                    <tr class="border-b dark:border-gray-700">
                        <th class="px-4 py-3">{{ (isset($sheet->student->student_name)?$sheet->student->student_name:'--') }}</th>
                        <th class="px-4 py-3">{{ (isset($sheet->package->package_name)?$sheet->package->package_name:'--') }}</th>
                        <th class="px-4 py-3">{{ (isset($sheet->filename->paper_name)?$sheet->filename->paper_name:'--') }}</th>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <div class="mt-4">
        {{ $sheets->links() }}
    </div>
</div>

