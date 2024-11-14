<!-- Life is available only in the present moment. - Thich Nhat Hanh -->
<div id="upload-file-div" class="items-center justify-center mx-10">
    <div class="flex justify-between items-center mb-2">
        <h2 class="text-lg font-bold text-gray-700">Upload File</h2> {{-- add summary --}}
        <button type="button" id="close-upload-btn"
            class="text-red-500 hover:text-red-700 focus:outline-none hover:cursor-pointer">
            <i class='bx bx-x bx-md'></i>
        </button>
    </div>
    <form id="upload-form" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div class="grid grid-cols-2 gap-x-10">
            <div class="col-span-2 ">
                <div class="flex items-center space-x-4">
                    <label for="file-upload" class="block mt-2">
                        <input type="file" name="file" class="hidden" id="file-upload">
                        <span
                            class="inline-block bg-green-500 text-white rounded-md px-8 py-2 cursor-pointer hover:bg-green-600 transition duration-200">
                            <i class='bx bx-cloud-upload'></i> Choose File
                        </span>
                    </label>

                    <p id="file-upload-name" class="mt-2 inline-block bg-green-500 text-white rounded-md px-8 py-2">
                        No file chosen
                    </p>

                </div>

                <p id="file-upload-error" class="text-red-500  min-h-[1.5rem] invisible mt-2 ml-32">
                    Please choose a file to upload.</p>
            </div>
            <!-- step 1 -->
            <div class="font-medium ">
                <div class="my-4">
                    <label for="name-of-client" class="block mb-2 text-sm font-medium text-gray-700">Name of
                        Client</label>
                    <input type="text" id="name-of-client" name="name_of_client" placeholder="Enter Value"
                        class="bg-gray-50 border border-gray-500 text-gray-900 placeholder-gray-700 text-sm rounded-lg 
                        block w-full p-2.5 
                        focus:border-green-500 focus:ring-green-500 
                        required:border-gray-500 required:ring-gray-500  required:text-gray-500 required:placeholder:text-gray-500
                        valid:border-green-500 valid:ring-green-500 valid:text-green-800 valid:bg-green-100"
                        autocomplete="off" required>
                    <p id="name-of-client-error" class="mt-2 text-sm text-red-600 hidden">
                        <span class="font-medium">Please!</span> Enter a valid name for the client!
                    </p>
                </div>

                <div class="my-4">
                    <label for="office-source" class="block mb-2 text-sm font-medium text-gray-700">Office
                        Source</label>
                    <input type="text" id="office-source" name="office_source" placeholder="Enter office source"
                        class="bg-gray-50 border border-gray-500 text-gray-900 placeholder-gray-700 text-sm rounded-lg 
                        block w-full p-2.5 
                        focus:border-green-500 focus:ring-green-500 
                        required:border-gray-500 required:ring-gray-500  required:text-gray-500 required:placeholder:text-gray-500
                        valid:border-green-500 valid:ring-green-500 valid:text-green-800 valid:bg-green-100"
                        autocomplete="off" required>
                    <p id="office-source-error" class="mt-2 text-sm text-red-600 hidden">
                        <span class="font-medium">Please!</span> Enter valid input!
                    </p>
                </div>

                <div class="my-4">
                    <label for="classification"
                        class="block mb-2 text-sm font-medium text-gray-700">Classification</label>
                    <select id="classification" name="classification"
                        class="bg-gray-50 border border-gray-500 text-gray-900 placeholder-gray-700 text-sm rounded-lg 
                        block w-full p-2.5 
                        focus:border-green-500 focus:ring-green-500 
                        required:border-gray-500 required:ring-gray-500  required:text-gray-500 required:placeholder:text-gray-500
                        valid:border-green-500 valid:ring-green-500 valid:text-green-800 valid:bg-green-100"
                        autocomplete="off" required>
                        <option value="" disabled selected>Select a Classification</option>
                        <option value="highly-technical">Highly Technical</option>
                        <option value="simple">Simple</option>
                    </select>
                </div>
                @if (isset($record))
                    <input type="hidden" id="report_type" value="{{ $record }}" name="report_type">
                @endif
                <input type="hidden" id="permit_type" value="{{ $type }}" name="permit_type">
                @if (!isset($category))
                    <input type="hidden" id="land_category" value="" name="land_category">
                @else
                    <input type="hidden" id="land_category" value="{{ $category }}" name="land_category">
                @endif
                <input type="hidden" id="municipality" value="{{ $municipality }}" name="municipality">
            </div>

            <!-- step 2 -->
            <div class="font-medium">
                @if ($type == 'tree-cutting-permits')
                    <div class="my-4">
                        <h2 class="block mb-2 text-sm font-medium text-gray-700">Add Tree
                            Specification</h2>
                        <button type="button" id="add-file-specification"
                            class="text-blue-700 mb-2 bg-blue-100 border border-blue-400 hover:bg-blue-200 focus:ring-2  focus:outline-none focus:ring-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2">
                            <svg class="size-5 text-red-700 font-extrabold" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Click to Add
                        </button>
                    </div>
                    <!-- Show species for tree-cutting-permits, tree-transport-permits -->

                    <!-- this for pop up modal for adding no. of trees/species/location/date applied/ -->
                @elseif ($type == 'chainsaw-registration')
                    <!-- Location Field -->
                    <div class="my-4">
                        <label for="location" class="block mb-2 text-sm font-medium text-gray-700">Location</label>
                        <input type="text" id="location" name="location"
                            class="bg-gray-50 border border-gray-500 text-gray-900 placeholder-gray-700 text-sm rounded-lg 
                        block w-full p-2.5 
                        focus:border-green-500 focus:ring-green-500 
                        required:border-gray-500 required:ring-gray-500  required:text-gray-500 required:placeholder:text-gray-500
                        valid:border-green-500 valid:ring-green-500 valid:text-green-800 valid:bg-green-100"
                            autocomplete="off" required placeholder="Enter location">
                        <p class="mt-2 text-sm text-red-600 hidden"><span class="font-medium">Please!</span> Enter
                            valid
                            input!</p>
                    </div>

                    <!-- Serial Number Field -->
                    <div class="my-4">
                        <label for="serial_number" class="block mb-2 text-sm font-medium text-gray-700">Serial
                            Number</label>
                        <input type="text" id="serial_number" name="serial_number"
                            class="bg-gray-50 border border-gray-500 text-gray-900 placeholder-gray-700 text-sm rounded-lg 
                        block w-full p-2.5 
                        focus:border-green-500 focus:ring-green-500 
                        required:border-gray-500 required:ring-gray-500  required:text-gray-500 required:placeholder:text-gray-500
                        valid:border-green-500 valid:ring-green-500 valid:text-green-800 valid:bg-green-100"
                            autocomplete="off" required placeholder="Enter serial number">
                        <p class="mt-2 text-sm text-red-600 hidden"><span class="font-medium">Please!</span> Enter
                            valid
                            input!</p>
                    </div>

                    <!-- Date Applied Field -->
                    <div class="my-4">
                        <label for="date_applied" class="block mb-2 text-sm font-medium text-gray-700">Date
                            Applied</label>
                        <input type="date" id="date_applied" name="date_applied"
                            class="bg-gray-50 border border-gray-500 text-gray-900 placeholder-gray-700 text-sm rounded-lg 
                        block w-full p-2.5 
                        focus:border-green-500 focus:ring-green-500 
                        required:border-gray-500 required:ring-gray-500  required:text-gray-500 required:placeholder:text-gray-500
                        valid:border-green-500 valid:ring-green-500 valid:text-green-800 valid:bg-green-100"
                            autocomplete="off" required>
                        <p class="mt-2 text-sm text-red-600 hidden"><span class="font-medium">Please!</span> Enter
                            valid
                            input!</p>
                    </div>
                @elseif ($type == 'tree-plantation')
                    <!-- Number of Trees Field -->
                    <div class="my-4">
                        <label for="number_of_trees" class="block mb-2 text-sm font-medium text-gray-700">No.
                            of Trees</label>
                        <input type="text" id="number_of_trees" name="number_of_trees"
                            class="bg-gray-50 border border-gray-500 text-gray-900 placeholder-gray-700 text-sm rounded-lg 
                        block w-full p-2.5 
                        focus:border-green-500 focus:ring-green-500 
                        required:border-gray-500 required:ring-gray-500  required:text-gray-500 required:placeholder:text-gray-500
                        valid:border-green-500 valid:ring-green-500 valid:text-green-800 valid:bg-green-100"
                            autocomplete="off" required placeholder="Enter number of trees">
                        <p class="mt-2 text-sm text-red-600 hidden"><span class="font-medium">Please!</span> Enter
                            valid
                            input!</p>
                    </div>

                    <!-- Location Field -->
                    <div class="my-4">
                        <label for="location" class="block mb-2 text-sm font-medium text-gray-700">Location</label>
                        <input type="text" id="location" name="location"
                            class="bg-gray-50 border border-gray-500 text-gray-900 placeholder-gray-700 text-sm rounded-lg 
                        block w-full p-2.5 
                        focus:border-green-500 focus:ring-green-500 
                        required:border-gray-500 required:ring-gray-500  required:text-gray-500 required:placeholder:text-gray-500
                        valid:border-green-500 valid:ring-green-500 valid:text-green-800 valid:bg-green-100"
                            autocomplete="off" required placeholder="Enter location">
                        <p class="mt-2 text-sm text-red-600 hidden"><span class="font-medium">Please!</span> Enter
                            valid
                            input!</p>
                    </div>

                    <!-- Date Applied Field -->
                    <div class="my-4">
                        <label for="date_applied" class="block mb-2 text-sm font-medium text-gray-700">Date
                            Applied</label>
                        <input type="date" id="date_applied" name="date_applied"
                            class="bg-gray-50 border border-gray-500 text-gray-900 placeholder-gray-700 text-sm rounded-lg 
                        block w-full p-2.5 
                        focus:border-green-500 focus:ring-green-500 
                        required:border-gray-500 required:ring-gray-500  required:text-gray-500 required:placeholder:text-gray-500
                        valid:border-green-500 valid:ring-green-500 valid:text-green-800 valid:bg-green-100"
                            autocomplete="off" required>
                        <p class="mt-2 text-sm text-red-600 hidden"><span class="font-medium">Please!</span> Enter
                            valid
                            input!</p>
                    </div>
                @elseif ($type == 'tree-transport-permits')
                    <!-- Transport Permits Inputs -->
                    <div class="my-4">
                        <h2 class="block mb-2 text-sm font-medium text-gray-700">Add Tree
                            Specification</h2>
                        <button type="button" id="add-file-specification"
                            class="text-blue-700 mb-2 bg-blue-100 border border-blue-400 hover:bg-blue-200 focus:ring-2  focus:outline-none focus:ring-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2">
                            <svg class="size-5 text-red-700 font-extrabold" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Click to Add
                        </button>
                    </div>

                    <!-- Date of Transport Field -->

                    <!-- Show species for tree-cutting-permits, tree-transport-permits -->
                    {{-- <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                        type="button"
                        class="text-white bg-[#FF9119] hover:bg-[#FF9119]/80 focus:ring-4 focus:outline-none focus:ring-[#FF9119]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-[#FF9119]/80 dark:focus:ring-[#FF9119]/40 me-2 mb-2">
                        <svg class="w-4 h-4 me-2 -ms-1" aria-hidden="true" focusable="false" data-prefix="fab"
                            data-icon="bitcoin" role="img" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <path fill="currentColor"
                                d="M504 256c0 136.1-111 248-248 248S8 392.1 8 256 119 8 256 8s248 111 248 248zm-141.7-35.33c4.937-32.1-20.19-50.74-54.55-62.57l11.15-44.7-27.21-6.781-10.85 43.52c-7.154-1.783-14.5-3.464-21.8-5.13l10.93-43.81-27.2-6.781-11.15 44.69c-5.922-1.349-11.73-2.682-17.38-4.084l.031-.14-37.53-9.37-7.239 29.06s20.19 4.627 19.76 4.913c11.02 2.751 13.01 10.04 12.68 15.82l-12.7 50.92c.76 .194 1.744 .473 2.829 .907-.907-.225-1.876-.473-2.876-.713l-17.8 71.34c-1.349 3.348-4.767 8.37-12.47 6.464 .271 .395-19.78-4.937-19.78-4.937l-13.51 31.15 35.41 8.827c6.588 1.651 13.05 3.379 19.4 5.006l-11.26 45.21 27.18 6.781 11.15-44.73a1038 1038 0 0 0 21.69 5.627l-11.11 44.52 27.21 6.781 11.26-45.13c46.4 8.781 81.3 5.239 95.99-36.73 11.84-33.79-.589-53.28-25-65.99 17.78-4.098 31.17-15.79 34.75-39.95zm-62.18 87.18c-8.41 33.79-65.31 15.52-83.75 10.94l14.94-59.9c18.45 4.603 77.6 13.72 68.81 48.96zm8.417-87.67c-7.673 30.74-55.03 15.12-70.39 11.29l13.55-54.33c15.36 3.828 64.84 10.97 56.85 43.03z">
                            </path>
                        </svg>
                        Pay with Bitcoin
                    </button> --}}
                    <!-- this for pop up modal for adding no. of trees/species/location/date applied/ -->
                    {{-- @include('components.file-upload.popup-tree-specification') --}}
                @elseif ($type == 'land-titles')
                    <!-- Location Field -->
                    <div class="my-4">
                        <label for="location" class="block mb-2 text-sm font-medium text-gray-700">Location</label>
                        <input type="text" id="location" name="location"
                            class="bg-gray-50 border border-gray-500 text-gray-900 placeholder-gray-700 text-sm rounded-lg 
                        block w-full p-2.5 
                        focus:border-green-500 focus:ring-green-500 
                        required:border-gray-500 required:ring-gray-500  required:text-gray-500 required:placeholder:text-gray-500
                        valid:border-green-500 valid:ring-green-500 valid:text-green-800 valid:bg-green-100"
                            autocomplete="off" required placeholder="Enter location">
                        <p class="mt-2 text-sm text-red-600 hidden"><span class="font-medium">Please!</span> Enter
                            valid
                            input!</p>
                    </div>

                    <!-- Lot Number Field -->
                    <div class="my-4">
                        <label for="lot_number" class="block mb-2 text-sm font-medium text-gray-700">Lot
                            Number</label>
                        <input type="text" id="lot_number" name="lot_number"
                            class="bg-gray-50 border border-gray-500 text-gray-900 placeholder-gray-700 text-sm rounded-lg 
                        block w-full p-2.5 
                        focus:border-green-500 focus:ring-green-500 
                        required:border-gray-500 required:ring-gray-500  required:text-gray-500 required:placeholder:text-gray-500
                        valid:border-green-500 valid:ring-green-500 valid:text-green-800 valid:bg-green-100"
                            autocomplete="off" required placeholder="Enter lot number">
                        <p class="mt-2 text-sm text-red-600 hidden"><span class="font-medium">Please!</span> Enter
                            valid
                            input!</p>
                    </div>

                    <!-- Property Category Field -->
                    <div class="my-4">
                        <label for="property_category" class="block mb-2 text-sm font-medium text-gray-700">Property
                            Category</label>
                        <input type="text" id="property_category" name="property_category"
                            class="bg-gray-50 border border-gray-500 text-gray-900 placeholder-gray-700 text-sm rounded-lg 
                        block w-full p-2.5 
                        focus:border-green-500 focus:ring-green-500 
                        required:border-gray-500 required:ring-gray-500  required:text-gray-500 required:placeholder:text-gray-500
                        valid:border-green-500 valid:ring-green-500 valid:text-green-800 valid:bg-green-100"
                            autocomplete="off" required placeholder="Enter property category">
                        <p class="mt-2 text-sm text-red-600 hidden"><span class="font-medium">Please!</span> Enter
                            valid
                            input!</p>
                    </div>
                @endif
            </div>
            @include('components.file-upload.specification-section')
            <div class="mt-4 flex justify-end gap-4 col-span-2">
                <button id="upload-btn" type="submit"
                    class="bg-green-500 text-white rounded-md px-4 py-2 hover:bg-green-600 transition duration-200">
                    <span id="button-spinner" class="hidden">
                        <svg aria-hidden="true" role="status" class="inline w-4 h-4 me-3 text-white animate-spin"
                            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="#E5E7EB" />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentColor" />
                        </svg>
                        Loading...
                    </span>
                    <span id="button-text">Upload</span>
                </button>
            </div>
        </div>
    </form>
</div>

<script>
    const fileInput = document.getElementById('file-upload');
    const fileUploadName = document.getElementById('file-upload-name');
    const fileUploadError = document.getElementById('file-upload-error');


    function validateFile() {
        const file = fileInput.files[0];


        if (fileInput.files.length === 0) {
            fileUploadError.textContent = "Please upload a file.";
            fileUploadError.classList.remove('invisible');
            return false;
        }
        const allowedTypes = [
            'application/pdf',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'image/jpeg',
            'image/png',
            'application/zip',
            'application/x-zip-compressed', // Some browsers may use this
            'multipart/x-zip' // Occasionally used
        ];
        if (!allowedTypes.includes(file.type)) {
            fileUploadError.textContent = "Invalid file type. Please upload a PDF, image, or ZIP file.";
            fileUploadError.classList.remove('invisible');
            return false;
        }
        fileUploadError.classList.add('invisible');
        return true;
    }

    fileInput.addEventListener('change', function() {
        const fileUploadError = document.getElementById('file-upload-error');

        if (fileInput.files.length > 0) {
            const selectedFile = fileInput.files[0];
            fileUploadName.textContent = selectedFile.name; // Update Step 1
            fileUploadError.classList.add('invisible'); // Hide error if file is chosen
        } else {
            fileUploadName.textContent = 'No file chosen'; // Reset if no file is chosen
            fileUploadError.classList.remove('invisible'); // Show error if no file is chosen
        }
    });

    function showToast(message, isSuccess) {
        const toast = document.getElementById('toast');
        const toastMessage = document.getElementById('toast-message');
        const toastClose = document.getElementById('toast-close');
        const toastTimer = document.getElementById('toast-timer');

        toastMessage.textContent = message;
        toast.classList.remove('hidden');


        if (isSuccess) {
            toast.classList.add('bg-green-500');
            toast.classList.remove('bg-red-500');
            toastTimer.classList.remove('bg-red-300');
            toastTimer.classList.add('bg-green-300');
        } else {
            toast.classList.add('bg-red-500');
            toast.classList.remove('bg-green-500');
            toastTimer.classList.remove('bg-green-300');
            toastTimer.classList.add('bg-red-300');
        }

        let timerDuration = 3000;
        let timerWidth = 100;


        toastTimer.style.width = '100%';


        const timerInterval = setInterval(() => {
            timerWidth -= (100 / (timerDuration / 100));
            toastTimer.style.width = `${timerWidth}%`;
        }, 100);


        setTimeout(() => {
            clearInterval(timerInterval);
            toast.classList.add('hidden');
        }, timerDuration);


        toastClose.onclick = function() {
            clearInterval(timerInterval);
            toast.classList.add('hidden');
        };
    }

    let fileId;

    document.getElementById('upload-form').addEventListener('submit', async function(event) {
        event.preventDefault();

        const formData = new FormData(this);

        try {
            // File upload
            const fileUploadResponse = await fetch('/file-upload', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: formData
            });

            if (!fileUploadResponse.ok) throw new Error("File upload failed");

            const fileResponseData = await fileUploadResponse.json();
            fileId = fileResponseData.fileId; // Assuming `id` is the file ID in the response

            const permitData = new FormData(this);
            permitData.append('file_id', fileId);
            console.log(fileId);
            const permitUploadResponse = await fetch('/permit-upload', {
                method: 'POST',
                body: permitData,
                headers: {
                    // Make sure you're referencing the correct token (check if it's _token or _csrf in the form)
                    'X-CSRF-TOKEN': csrfToken
                },
            });

            if (!permitUploadResponse.ok) throw new Error("Permit upload failed");

            console.log("File and permit data uploaded successfully");
            this.reset();
        } catch (error) {
            console.error('Error uploading file:', error);
        }
    });



    // fetch('/file-upload', {
    //         method: 'POST',
    //         body: formData,
    //         headers: {
    //             // 'X-CSRF-TOKEN': csrfToken
    //         }
    //     })
    //     .then(response => response.json())
    //     .then(data => {
    //         document.getElementById('name-of-client')
    //             .value;
    //         if (data.success) {
    //             showToast(data.message, true);
    //             fileId = data.fileId;

    //              let formPermit = new FormData();
    //             formPermit.append('file_id', fileId);
    //             formPermit.append('permit_type', permit_type);

    //             // Gather values based on form type



    //             fetch('/permit-upload', {
    //                     method: 'POST',
    //                     body: formPermit,
    //                     headers: {
    //                         'X-CSRF-TOKEN': csrfToken
    //                     }

    //                 })
    //                 .then(response => response.json())
    //                 .then(data => {
    //                     if (data.success) {
    //                         showSuccessAlert(data.success || "Operation completed successfully!");
    //                         fetchData()
    //                     }
    //                 })
    //                 .catch((error) => {
    //                     showToast(error || 'File upload failed.', false);
    //                 });



    //         } else {

    //             showToast(data.message || 'File upload failed.', false);
    //         }
    //     })
    //     .catch(error => {
    //         console.error(error);
    //     }).finally(() => {

    //         this.reset();

    //         const fileInput = document.getElementById('file-upload');
    //         const fileUploadName = document.getElementById('file-upload-name');


    //         fileUploadName.textContent = 'No file chosen';


    //         submitButton.disabled = false;
    //         buttonText.classList.remove('hidden'); // Show the button text again
    //         buttonSpinner.classList.add('hidden'); // Hide the spinner

    //     });
</script>
