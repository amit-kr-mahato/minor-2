
    function addCategory(event) {
        event.preventDefault();
        const container = document.getElementById('category-container');

        const group = document.createElement('div');
        group.className = 'd-flex align-items-center mb-2 category-group';

        group.innerHTML = `
            <input list="categoryOptions" name="categories[]" class="form-control me-2" placeholder="Select or type category" required>
            
            <a href="#" class="text-danger remove-category"
                onclick="event.preventDefault(); this.closest('.category-group').remove();">Remove</a>
        `;

        container.appendChild(group);
    }



 // Only one checkbox can be checked
    document.querySelectorAll('input[name="role"]').forEach((checkbox) => {
        checkbox.addEventListener('change', function () {
            document.querySelectorAll('input[name="role"]').forEach(cb => cb.checked = false);
            this.checked = true;
        });
    });



  function checkStrength(value) {
    const text = document.getElementById('text');
    if (value.length > 6) {
      text.innerText = 'Strong';
      text.style.backgroundColor = 'green';
    } else {
      text.innerText = 'Weak';
      text.style.backgroundColor = 'red';
    }
  }



// --------------------------show more content---------------------------------
document.addEventListener("DOMContentLoaded", function (event) {
    event.preventDefault();
    const readMoreLink = document.querySelector(".read-more");
    const fullParagraph = document.querySelector(".full-paragraph");

    readMoreLink.addEventListener("click", function (event) {
        event.preventDefault(); // Prevent the default anchor behavior
        fullParagraph.style.display =
            fullParagraph.style.display === "none" ? "block" : "none";
        readMoreLink.textContent =
            fullParagraph.style.display === "block" ? "Read less" : "Read more";
    });
});

//  ===================================== image slider========================================
var nextBtn = document.querySelector(".next"),
    prevBtn = document.querySelector(".prev"),
    carousel = document.querySelector(".carousel"),
    list = document.querySelector(".list"),
    item = document.querySelectorAll(".item"),
    runningTime = document.querySelector(".carousel .timeRunning");

let timeRunning = 3000;
let timeAutoNext = 4000;

nextBtn.onclick = function () {
    showSlider("next");
};

prevBtn.onclick = function () {
    showSlider("prev");
};

let runTimeOut;

let runNextAuto = setTimeout(() => {
    nextBtn.click();
}, timeAutoNext);

function resetTimeAnimation() {
    runningTime.style.animation = "none";
    runningTime.offsetHeight; /* trigger reflow */
    runningTime.style.animation = null;
    runningTime.style.animation = "runningTime 7s linear 1 forwards";
}

function showSlider(type) {
    let sliderItemsDom = list.querySelectorAll(".carousel .list .item");
    if (type === "next") {
        list.appendChild(sliderItemsDom[0]);
        carousel.classList.add("next");
    } else {
        list.prepend(sliderItemsDom[sliderItemsDom.length - 1]);
        carousel.classList.add("prev");
    }

    clearTimeout(runTimeOut);

    runTimeOut = setTimeout(() => {
        carousel.classList.remove("next");
        carousel.classList.remove("prev");
    }, timeRunning);

    clearTimeout(runNextAuto);
    runNextAuto = setTimeout(() => {
        nextBtn.click();
    }, timeAutoNext);

    resetTimeAnimation(); // Reset the running time animation
}

// Start the initial animation
resetTimeAnimation();
//===============================================end =======================================


// const map = L.map("map").setView([37.7749, -122.4194], 12);
// L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
//     attribution: "&copy; OpenStreetMap contributors",
// }).addTo(map);
// const locations = [
//     { coords: [37.7749, -122.4194], popup: "San Francisco City Center" },
//     { coords: [37.7849, -122.4094], popup: "Elite Electricians HQ" },
// ];
// locations.forEach((loc) => {
//     L.marker(loc.coords).addTo(map).bindPopup(loc.popup);
// });


