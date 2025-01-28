"use strict";

let galeryFilter = document.querySelectorAll(".galery__filter-part > div");
let filterOptions = document.querySelectorAll(".galery__filter-part");

galeryFilter.forEach((galery) => {
    galery.addEventListener("click", (e) => {
        e.stopPropagation();
        e.currentTarget.parentElement.classList.toggle("active");
    });
});


const gallary_wrapper = document.querySelector('.galery__grid');
function getGallaryImage(url, page, start = false) {
    const activeLang = document.documentElement.getAttribute('lang') || document.body.getAttribute('data-lang') || 'az'; // Aktiv dili al

    let fetchUrl = start ? url + "?page=" + page+'&lang='+activeLang : url + "&page=" + page+'&lang='+activeLang
    // console.log(fetchUrl)
    fetch(fetchUrl, {
        method: 'GET',
        headers: {
            'X-API-KEY': 'your_api_key',

        },
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log(data.images)
            // console.log(data)
            if (data.images.length > 0) {
                data.images.forEach(image => {
                    let availability = image.availability == "2" ? gallary_wrapper.getAttribute('data-available') : image.availability == "3" ? gallary_wrapper.getAttribute('data-notForSale') : gallary_wrapper.getAttribute('data-sold')
                    let url = gallary_wrapper.getAttribute('data-url')

                    let element =
                        `
                     <figure class="flex flex-direct-col align-items-center">
                         <div>
                            <a
                              class="galery__img ${image.style == "2" ? "gi1" : ""}"
                              href="${url}/${image.slug}"
                              aria-label="${image.translated_title}"
                              title="${image.translated_title}"
                            >
                            <picture>
                              <img
                                src="${image.image.path}"
                                alt=""
                                width=""
                                height=""
                              />
                              <span class="status flex-center">${availability}</span>
                            </picture>
                            </a>
                            </div>
                            <div class="picture__name flex align-items-center">
                              <span>${image.translated_title}</span>
                              <span>${image.translated_short_description}</span>
                            </div>
                         </figure>`
                    gallary_wrapper.insertAdjacentHTML('beforeend', element);
                })
            }
            else {
                let element = document.createElement('div');
                element.textContent = gallary_wrapper.getAttribute('data-notFound');
                gallary_wrapper.insertAdjacentElement('beforeend', element);
                setTimeout(() => {
                    element.remove();
                }, 1000);

            }

        })
        .catch(error => {
            console.error('There was a problem with your fetch operation:', error);
        });
}

const GalleryLoadMoreBtn = document.querySelector('.gallery_load_more > button')
const localStorageGenreId = localStorage.getItem('link');

// localStorageGenreId kontrolü ve dataUrl oluşturma
if (localStorageGenreId) {
    let dataUrl = GalleryLoadMoreBtn.getAttribute('data-url');
    // dataUrl içinde genre= kısmının index'ini bul
    const genreIndex = dataUrl.indexOf('genre=');
    if (genreIndex !== -1) {
        // genre= kısmının sonuna localStorageGenreId'yi ekleyerek yeni bir URL oluştur
        dataUrl = dataUrl.slice(0, genreIndex + 6) + localStorageGenreId + dataUrl.slice(genreIndex + 6);
        getGallaryImage(dataUrl, GalleryLoadMoreBtn.getAttribute("data-page"), true);
    } else {
        // Eğer genre= kısmı bulunamazsa, localStorageGenreId'yi başına ekleyerek yeni bir URL oluştur
        dataUrl += localStorageGenreId;
        getGallaryImage(dataUrl, GalleryLoadMoreBtn.getAttribute("data-page"), true);
    }
    localStorage.removeItem('link');

} else {
    getGallaryImage(GalleryLoadMoreBtn.getAttribute('data-url'), GalleryLoadMoreBtn.getAttribute("data-page"), true);
}


GalleryLoadMoreBtn.addEventListener("click", () => {
    let page = (+GalleryLoadMoreBtn.getAttribute("data-page") + 1)
    GalleryLoadMoreBtn.setAttribute("data-page", page)
    let data_url = GalleryLoadMoreBtn.getAttribute('data-url')

    getGallaryImage(data_url, page);
})

let inputsGenres = document.querySelectorAll(".genre_input");
let inputsTechniques = document.querySelectorAll(".technique_input");
let inputsinputAvailablity = document.querySelectorAll(".input_availablity");
let genre = [];
let technique = []
let availability = []

inputsGenres.forEach((input) => {
    input.addEventListener("change", () => {
        let dataId = input.getAttribute('data-id');

        if (input.checked) {
            genre.push(dataId);
        } else {
            let index = genre.indexOf(dataId);
            if (index !== -1) {
                genre.splice(index, 1);
            }
        }

        let newGenre = genre.join(',');
        gallary_wrapper.innerHTML = ''
        let newUrl = '/api/images?genre=' + newGenre + "&technique=" + technique + "&availablity=" + availability
        GalleryLoadMoreBtn.setAttribute("data-url", newUrl)
        GalleryLoadMoreBtn.setAttribute("data-page", 1)
        getGallaryImage(newUrl, 1)
    });
});

inputsTechniques.forEach((input) => {
    input.addEventListener("change", () => {
        let dataId = input.getAttribute('data-id');

        if (input.checked) {
            technique.push(dataId);
        } else {
            let index = technique.indexOf(dataId);
            if (index !== -1) {
                technique.splice(index, 1);
            }
        }

        let newGenre = technique.join(',');
        gallary_wrapper.innerHTML = ''
        let newUrl = '/api/images?genre=' + genre + "&technique=" + newGenre + "&availablity=" + availability
        GalleryLoadMoreBtn.setAttribute("data-url", newUrl)
        GalleryLoadMoreBtn.setAttribute("data-page", 1)
        getGallaryImage(newUrl, 1)
    });
});

inputsinputAvailablity.forEach((input) => {
    input.addEventListener("change", () => {
        let dataId = input.getAttribute('data-id');

        if (input.checked) {
            availability.push(dataId);
        } else {
            let index = availability.indexOf(dataId);
            if (index !== -1) {
                availability.splice(index, 1);
            }
        }

        let newGenre = availability.join(',');
        gallary_wrapper.innerHTML = ''
        let newUrl = '/api/images?genre=' + genre + "&technique=" + technique + "&availability=" + newGenre
        GalleryLoadMoreBtn.setAttribute("data-url", newUrl)
        GalleryLoadMoreBtn.setAttribute("data-page", 1)
        getGallaryImage(newUrl, 1)
    });
});