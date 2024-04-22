
document.addEventListener("DOMContentLoaded", function() {
    let cookiePopup = document.getElementById('cookiePopup');
    let acceptCookieBtn = document.getElementById('acceptCookie');
    let closePopupBtn = document.getElementById('closePopup');

    let cookieCounter = localStorage.getItem('cookieCounter') || 0;
    
    if (cookieCounter < 2) {
        cookiePopup.style.display = 'block';
    }

//  обработка принятия куков
    acceptCookieBtn.addEventListener('click', function() {
        cookiePopup.style.display = 'none';
        localStorage.setItem('cookieCounter', 2);
    });

// обработка закрытия попапа
    closePopupBtn.addEventListener('click', function() {
        cookiePopup.style.display = 'none';
        cookieCounter++;
        localStorage.setItem('cookieCounter', cookieCounter);
    });
});