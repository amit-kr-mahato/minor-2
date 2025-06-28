<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Multiple Image Upload with Captions & Delete</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 700px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            text-align: center;
        }

        .highlight {
            color: #e63946;
        }

        .view-link {
            display: inline-block;
            margin: 10px 0 20px;
            color: #0077cc;
            text-decoration: none;
        }

        .upload-box {
            border: 2px dashed #ccc;
            padding: 40px 20px;
            border-radius: 10px;
            background-color: #fafafa;
        }

        .upload-img {
            width: 120px;
            margin-bottom: 20px;
        }

        .upload-text {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .browse-btn {
            background-color: #0077cc;
            color: white;
            padding: 10px 20px;
            display: inline-block;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="file"] {
            display: none;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 10;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            overflow-y: auto;
        }

        .modal-content {
            background-color: white;
            margin: 5% auto;
            padding: 20px;
            border-radius: 10px;
            max-width: 700px;
            position: relative;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 30px;
            font-size: 30px;
            font-weight: bold;
            cursor: pointer;
        }

        .images-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 40px;
        }

        .image-card {
            width: 140px;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 8px;
            text-align: center;
            position: relative;
            background: #fafafa;
        }

        .image-card img {
            max-width: 100%;
            border-radius: 6px;
        }

        .caption-group {
            margin-top: 8px;
            text-align: left;
        }

        .caption-group textarea {
            width: 100%;
            height: 60px;
            resize: vertical;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 5px;
            font-size: 13px;
        }

        .delete-btn {
            position: absolute;
            top: 6px;
            right: 6px;
            background: #e63946;
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 50%;
            width: 22px;
            height: 22px;
            cursor: pointer;
            line-height: 18px;
        }

        .modal-footer {
            margin-top: 25px;
            text-align: left;
        }

        .upload-btn {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .upload-btn:hover {
            background-color: #218838;
        }

        .modal-footer a {
            color: #0077cc;
            cursor: pointer;
            text-decoration: underline;
        }

        .guideline-container {
            max-width: 1200px;
            margin: 40px auto;
            display: flex;
            justify-content: space-around;
            gap: 20px;
            flex-wrap: wrap;
            padding: 0 20px;
            text-align: center;
        }

        .guideline-item {
            flex: 1 1 200px;
            max-width: 250px;
        }

        .guideline-item img {
            width: 120px;
            height: auto;
            margin-bottom: 15px;
        }

        .guideline-item p {
            color: #444a57;
            font-size: 14px;
            line-height: 1.4;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2><span class="highlight">Mountain Mike's Pizza:</span> Add photos and videos</h2>
        <a href="{{route('seemorebusinessdetail')}}" class="view-link">View all photos and videos</a>

        <form>
            <div class="upload-box">
                <img src="https://s3-media0.fl.yelpcdn.com/assets/public/photo_review_325x200_v2.yji-9de7a3277cea44fd0377.svg"
                    alt="Upload Illustration" class="upload-img" />
                <h3 class="upload-text">Drag and drop photos/videos here</h3>
                <p>or</p>

                <label for="file-upload" class="browse-btn">Browse Files</label>
                <input type="file" id="file-upload" name="images[]" multiple accept="image/*" hidden />
            </div>
    </div>

    <!-- Modal -->
    <div class="modal" id="uploadModal" style="display:none;">
        <div class="modal-content">
            <span class="close-btn" title="Close modal">&times;</span>
            <h2>Add captions and upload</h2>

            <div class="images-container" id="imagesContainer">
                <!-- Dynamically added image cards will go here -->
            </div>

            <div class="modal-footer">
                <a href="#" id="browseMore">Browse</a> or drag and drop more photos/videos
                <br /><br />
                <button class="upload-btn" type="submit" id="uploadBtn">Upload</button>
            </div>
        </div>
    </div>

    </form>

    <div class="guideline-container">
        <div class="guideline-item">
            <img src="https://s3-media0.fl.yelpcdn.com/assets/public/shaky_photos_200x150_v2.yji-d2edbe3d0cecbb3aad01.svg"
                alt="No shaky photos">
            <p>Refrain from posting shaky or out of focus photos.</p>
        </div>
        <div class="guideline-item">
            <img src="https://s3-media0.fl.yelpcdn.com/assets/public/flash_photos_200x150_v2.yji-1f472f098de4f1ce3e8b.svg"
                alt="Well lit photos">
            <p>Your photos should be well lit and bright. Don’t be afraid to use the flash on your camera.</p>
        </div>
        <div class="guideline-item">
            <img src="https://s3-media0.fl.yelpcdn.com/assets/public/photo_filters_200x150_v2.yji-8ee4efb202a260383e73.svg"
                alt="Minimal filters">
            <p>If you’re applying filters, don’t overdo them. Subtlety is key.</p>
        </div>
        <div class="guideline-item">
            <img src="https://s3-media0.fl.yelpcdn.com/assets/public/business_photos_200x150_v2.yji-ec69f38b451e03e2e9a5.svg"
                alt="Only business photos">
            <p>Lastly, please only post photos of the business.</p>
        </div>
                
    </div>


    <script>
        const fileInput = document.getElementById('file-upload');
        const dropArea = document.getElementById('dropArea');
        const modal = document.getElementById('uploadModal');
        const imagesContainer = document.getElementById('imagesContainer');
        const closeModal = document.getElementById('closeModal');

        let filesList = [];

        function openModal() {
            imagesContainer.innerHTML = '';
            filesList.forEach((file, i) => {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const div = document.createElement('div');
                    div.classList.add('image-card');
                    div.innerHTML = `
                    <img src="${e.target.result}" class="preview-img"/>
                    <input type="hidden" name="images[]" />
                    <input type="text" name="captions[]" placeholder="Enter caption">
                `;
                    imagesContainer.appendChild(div);
                };
                reader.readAsDataURL(file);
            });
            modal.style.display = 'block';
        }

        fileInput.addEventListener('change', (e) => {
            filesList = Array.from(e.target.files);
            openModal();
        });

        dropArea.addEventListener('dragover', e => {
            e.preventDefault();
            dropArea.style.borderColor = '#000';
        });

        dropArea.addEventListener('drop', e => {
            e.preventDefault();
            filesList = Array.from(e.dataTransfer.files);
            openModal();
        });

        document.getElementById('browseMore').addEventListener('click', function (e) {
            e.preventDefault();
            fileInput.click();
        });

        closeModal.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        document.getElementById('uploadForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData();
            const captions = document.querySelectorAll('input[name="captions[]"]');

            filesList.forEach((file, i) => {
                formData.append('images[]', file);
            });

            captions.forEach((caption) => {
                formData.append('captions[]', caption.value);
            });

            fetch("{{ route('images.upload') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: formData
            })
                .then(res => res.json())
                .then(data => {
                    alert('Upload successful!');
                    location.reload();
                })
                .catch(err => {
                    console.error('Upload failed:', err);
                    alert('Something went wrong.');
                });
        });
    </script>

</body>

</html>