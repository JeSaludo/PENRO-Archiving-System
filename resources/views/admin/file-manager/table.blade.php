@extends('layouts.admin.master')

@section('title', 'PENRO Archiving System')

@section('content')

    @component('components.bread-crumb.file-manager-bread-crumb', [
        'type' => $type ?? '',
        'municipality' => $municipality ?? '',
        'category' => $category ?? '',
    ])
    @endcomponent

    <div class="overflow-auto rounded-md text-black p-4">

        <div class="w-full">
            <div class="space-x-3 mb-4">
                <x-button id="uploadBtn" label="Upload File" type="submit" style="primary" />
                <x-button id="" label="Create a Folder" style="secondary" />
            </div>
        </div>

        <!-- call other pop up using x-component-->
        <x-modal.file-modal />
        <!-- file sharing-->
        @component('components.file-share.file-share', [
            'includePermit' => true,
        ])
        @endcomponent
        @component('components.file-request.file-request', [
            //Enter here for passing variable(future purposes)
        ])
        @endcomponent
        <div class="grid">
            <div id="mainTable" class="transition-opacity duration-500 ease-in-out opacity-100 ">
                <div class="overflow-x-auto bg-white rounded-md p-5 shadow-md border border-gray-300 h-[calc(80vh-100px)]">
                    <!-- load the table-->
                    @component('components.forms.table', [
                        'type' => $type ?? '',
                        'municipality' => $municipality ?? '',
                        'isAdmin' => auth()->check() && auth()->user()->isAdmin,
                        'isArchived' => false,
                        'category' => $category ?? '',
                    ])
                        <!--add something to use in the table updated by harvs-->
                    @endcomponent
                </div>
            </div>
            <div id="fileSection" class="transition-opacity duration-500 ease-in-out opacity-0 pointer-events-none hidden">
                <div class="grid grid-cols-3 gap-4 bg-greem-100">
                    <div class="overflow-y-auto rounded-md bg-white p-5 border border-gray-300 shadow-md">
                        @component('components.forms.minimize-table', [
                            'type' => $type ?? '',
                            'municipality' => $municipality ?? '',
                            'isAdmin' => auth()->check() && auth()->user()->isAdmin,
                            'isArchived' => false,
                            'category' => $category ?? '',
                        ])
                            <!--add something to use in the table updated by harvs-->
                        @endcomponent
                        <!-- minimize table here-->
                    </div>

                    <div class=" p-4 col-span-2 bg-white rounded-md border border-gray-300 shadow-md">
                        {{-- this for upload --}}
                        @component('components.move.move-file', [])
                        @endcomponent

                        @component('components.file-upload.file-upload', [
                            'type' => $type ?? '',
                            'municipality' => $municipality ?? '',
                            'record' => $type ?? '',
                            'isAdmin' => auth()->check() && auth()->user()->isAdmin,
                            'isArchived' => false,
                            'category' => $category ?? '',
                        ])
                        @endcomponent

                        @component('components.edit.edit-file', [
                            'type' => $type ?? '',
                            'municipality' => $municipality ?? '',
                            'record' => $record ?? '',
                        ])
                        @endcomponent

                        @component('components.file-summary.file-summary', [
                            'type' => $type ?? '',
                            'municipality' => $municipality ?? '',
                            'record' => $record ?? '',
                        ])
                        @endcomponent
                        <!-- for showing the specification details-->

                        <div id="toast"
                            class="hidden fixed z-[90] right-0 bottom-0 m-8 bg-red-500 text-white p-4 rounded-lg shadow-lg transition-opacity duration-300 ">
                            <div class="flex justify-between items-center">
                                <p id="toast-message" class="mr-4"></p>
                                <button id="toast-close" class="text-white focus:outline-none hover:text-gray-200">
                                    <i class='bx bx-x bx-md'></i>
                                </button>
                            </div>
                            <div id="toast-timer" class="w-full h-1 bg-green-300 mt-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.file-manager.component.js')
@endsection
