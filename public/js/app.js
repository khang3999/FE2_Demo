loadPhotos();


async function loadPhotos() {
    // 1
    const url = 'app/api/photoall.php';

    // 2
    const response = await fetch(url);

    // 3
    const result = await response.json();

    const gallery = document.querySelector('.gallery');
    const galleryBg = document.querySelector('.gallery-bg');
    const canvas = document.querySelector('.canvas');

    const arrRate = [];
    for (let i = 0; i < result.length; i++) {
        arrRate.push(Math.random());
    }
    arrRate.sort(function (a, b) { return a - b });

    result.forEach((element, index) => {
        const pic = document.createElement('div');
        pic.setAttribute('data-bs-toggle', "modal");
        pic.setAttribute('data-bs-target', "#exampleModal");
        pic.innerHTML = `<img src="public/images/${element.source}" alt="">`;
        pic.innerHTML += `<div class="control"><i class="bi bi-heart-fill"></i> ${element.likes}</div>`;

        pic.classList.add('pic');
        pic.style.top = getRandomIntInclusive(25, 65) + '%';
        pic.style.left = getRandomIntInclusive(25, 65) + '%';

        pic.style.transform = `translateZ(${250 * arrRate[index]}px)`;
        pic.style.filter = `brightness(${150 * arrRate[index]}%)`;
        pic.addEventListener('click', function () {
            like(element.id, this)
        });
        gallery.append(pic);
    });

    const halfWidth = window.innerWidth / 2;
    const halfHeight = window.innerHeight / 2;
    canvas.addEventListener('mousemove', function (e) {
        const rateX = (e.clientX / halfWidth - 1) * -1;
        const rateY = (e.clientY / halfHeight - 1);

        gallery.style.transform = `rotateY(${30 * rateX}deg) rotateX(${30 * rateY}deg)`;
        galleryBg.style.transform = `rotateY(${5 * rateX}deg) rotateX(${5 * rateY}deg)`;
    });
    
}



function getRandomIntInclusive(min, max) {
    const minCeiled = Math.ceil(min);
    const maxFloored = Math.floor(max);
    return Math.floor(Math.random() * (maxFloored - minCeiled + 1) + minCeiled); // The maximum is inclusive and the minimum is inclusive
}

async function like(id, target) {
    target.querySelector('.control').innerHTML = `Loading...`;

    const url = 'app/api/photolike.php';
    const data = { photoId: id };
    
    const response = await fetch(url, {
        method: 'POST',
        body: JSON.stringify(data)
    });

    const result = await response.json();
    target.querySelector('.control').innerHTML = `<i class="bi bi-heart-fill"></i> ${result.likes}</div>`;
}