import './styles/root.css'
import './styles/style.css'
import './styles/media.css'

new Swiper(".mainSwiper", {
    effect: "fade",
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
});

new Swiper(".weatherSwiper", {
    slidesPerView: 1,
    spaceBetween: 5,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".weatherPagination",
        clickable: true,
        renderBullet: function (index, className) {
            return '<span class="' + className + '"></span>';
        },
    },
    navigation: {
        nextEl: ".weatherNext",
        prevEl: ".weatherPrev",
    },
    breakpoints: {
        540: {
            slidesPerView: 2,
        },
        720: {
            slidesPerView: 3,
        },
    }
});

new Swiper(".newsSwiper", {
    slidesPerView: 1,
    spaceBetween: 40,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".newsNext",
        prevEl: ".newsPrev",
    },
    pagination: {
        el: ".newsPagination",
        clickable: true,
        renderBullet: function (index, className) {
            return '<span class="' + className + '"></span>';
        },
    },
    breakpoints: {
        540: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3.5,
        }
    }
});

new Swiper(".forumSwiper", {
    slidesPerView: 1,
    spaceBetween: 40,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".forumNext",
        prevEl: ".forumPrev",
    },
    pagination: {
        el: ".forumPagination",
        clickable: true,
        renderBullet: function (index, className) {
            return '<span class="' + className + '"></span>';
        },
    },
    breakpoints: {
        540: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3.5,
        }
    }
});

new Swiper(".partnersSwiper", {
    slidesPerView: 1,
    spaceBetween: 20,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".partnersNext",
        prevEl: ".partnersPrev",
    },
    pagination: {
        el: ".partnersPagination",
        clickable: true,
        renderBullet: function (index, className) {
            return '<span class="' + className + '"></span>';
        },
    },
    breakpoints: {
        720: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 4,
        }
    }
});

new Swiper(".singleWeatherSwiper", {
    slidesPerView: 1,
    spaceBetween: 5,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".singleWeatherNext",
        prevEl: ".singleWeatherPrev",
    },
    breakpoints: {
        540: {
            slidesPerView: 2,
        },
        720: {
            slidesPerView: 3,
        },
        960: {
            slidesPerView: 4,
        },
        1280: {
            slidesPerView: 2,
        }
    }
});

new Swiper(".singleSimilarSwiper", {
    slidesPerView: 1,
    spaceBetween: 5,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".singleSimilarNext",
        prevEl: ".singleSimilarPrev",
    },
    breakpoints: {
        540: {
            slidesPerView: 2,
        },
        720: {
            slidesPerView: 3,
        },
        960: {
            slidesPerView: 4,
        },
        1280: {
            slidesPerView: 1,
        }
    }
});

function mobileMenu(menu, open, close) {
    open = document.querySelector('.' + open);
    menu = document.querySelector('.' + menu);

    if (open) {
        open.addEventListener('click', function () {
            menu.classList.add('mobile-menu_open');
        })
    }

    close = document.querySelectorAll(close);
    if (close) {
        close.forEach(function (elem) {
            elem.addEventListener('click', function () {
                menu.classList.remove('mobile-menu_open');
            })
        })
    }
}

mobileMenu('mobile-menu-js', 'mobile-btn-js', '.mobile-close-js');

// function lockContent(elem) {
//     elem = document.querySelector('.' + elem);
//     elem.ondragstart = noselect;
//     elem.onselectstart = noselect;
//     elem.oncontextmenu = noselect;
//     function noselect() {return false;}
// }
//
// lockContent('single-js')

document.oncopy = function(){
    let body = document.getElementsByTagName('body')[0];
    let selection = window.getSelection();
    let div = document.createElement('div');

    div.style.position = 'absolute';
    div.style.left = '-99999px';
    body.appendChild(div);
    div.innerHTML = 'Информация со страницы: ' + document.location.href;
    selection.selectAllChildren(div);

    window.setTimeout(function(){
        body.removeChild(div);
    }, 0);
}