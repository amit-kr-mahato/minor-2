<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
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
        <a href="#" class="view-link">View all photos and videos</a>

        <div class="upload-box">
            <img src="https://s3-media0.fl.yelpcdn.com/assets/public/photo_review_325x200_v2.yji-9de7a3277cea44fd0377.svg"
                alt="Upload Illustration" class="upload-img" />
            <h3 class="upload-text">Drag and drop photos/videos here</h3>
            <p>or</p>
            <form>
                <label for="file-upload" class="browse-btn">Browse Files</label>
                <input type="file" id="file-upload" multiple accept="image/*" />
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal" id="uploadModal">
        <div class="modal-content">
            <span class="close-btn" title="Close modal">&times;</span>
            <h2>Add captions and upload</h2>

            <div class="images-container" id="imagesContainer">
                <!-- Dynamically added image cards will go here -->
            </div>

            <div class="modal-footer">
                <a href="#" id="browseMore">Browse</a> or drag and drop more photos/videos
                <br /><br />
                <button class="upload-btn" id="uploadBtn">Upload</button>
            </div>
        </div>
    </div>

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
        const modal = document.getElementById('uploadModal');
        const imagesContainer = document.getElementById('imagesContainer');
        const closeBtn = modal.querySelector('.close-btn');
        const browseMore = document.getElementById('browseMore');
        const uploadBtn = document.getElementById('uploadBtn');

        // Store images and captions as objects { file: File, url: string, caption: string }
        let imagesData = [];

        function createImageCard(imageObj, index) {
            const card = document.createElement('div');
            card.className = 'image-card';

            const img = document.createElement('img');
            img.src = imageObj.url;
            img.alt = `Image ${index + 1}`;

            const deleteBtn = document.createElement('button');
            deleteBtn.className = 'delete-btn';
            deleteBtn.title = 'Delete this image';
            deleteBtn.innerHTML = '&times;';
            deleteBtn.addEventListener('click', () => {
                imagesData.splice(index, 1);
                renderImages();
            });

            const captionGroup = document.createElement('div');
            captionGroup.className = 'caption-group';

            const label = document.createElement('label');
            label.textContent = 'Caption (optional)';

            const textarea = document.createElement('textarea');
            textarea.placeholder = "What’s in this photo?";
            textarea.value = imageObj.caption || '';
            textarea.addEventListener('input', (e) => {
                imagesData[index].caption = e.target.value;
            });

            captionGroup.appendChild(label);
            captionGroup.appendChild(textarea);

            card.appendChild(deleteBtn);
            card.appendChild(img);
            card.appendChild(captionGroup);

            return card;
        }

        function renderImages() {
            imagesContainer.innerHTML = '';
            if (imagesData.length === 0) {
                closeModal();
                return;
            }
            imagesData.forEach((imgObj, idx) => {
                const card = createImageCard(imgObj, idx);
                imagesContainer.appendChild(card);
            });
        }

        function closeModal() {
            modal.style.display = 'none';
            // Optional: clear file input to allow re-upload same files if needed
            fileInput.value = '';
            imagesContainer.innerHTML = '';
            imagesData = [];
        }

        fileInput.addEventListener('change', (e) => {
            const files = Array.from(e.target.files);
            files.forEach(file => {
                if (!file.type.startsWith('image/')) return; // skip non-images
                const url = URL.createObjectURL(file);
                imagesData.push({ file, url, caption: '' });
            });
            if (imagesData.length) {
                modal.style.display = 'block';
                renderImages();
            }
        });

        closeBtn.addEventListener('click', () => {
            if (confirm("Are you sure you want to discard?")) {
                closeModal();
            }
        });

        // Clicking outside modal content closes modal with confirmation
        window.addEventListener('click', (event) => {
            if (event.target === modal) {
                if (confirm("Are you sure you want to discard?")) {
                    closeModal();
                }
            }
        });

        browseMore.addEventListener('click', (e) => {
            e.preventDefault();
            fileInput.click();
        });

        // Dummy upload action: just logs files and captions
        uploadBtn.addEventListener('click', () => {
            if (imagesData.length === 0) {
                alert("No images to upload!");
                return;
            }
            // You can replace this with your real upload logic (e.g. AJAX)
            imagesData.forEach(({ file, caption }, i) => {
                console.log(`Uploading file #${i + 1}:`, file);
                console.log(`Caption: "${caption}"`);
            });
            alert("Upload simulated. Check console for output.");
            closeModal();
        });
    </script>

</body>

</html>