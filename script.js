document.addEventListener("DOMContentLoaded", function() {
    const jumbotron = document.querySelector('.jumbotron');
    const images = [
      'img/gelang20.jpg',
'img/gelang21.jpg',
'img/gelang22.jpg',
'img/gelang23.jpg',
'img/gelang24.jpg',
'img/gelang25.jpg',
'img/gelang26.jpg',
'img/gelang27.jpg',
'img/gelang28.jpg',
'img/gelang29.jpg',
'img/gelang30.jpg',
'img/gelang31.jpg',
'img/gelang32.jpg',
'img/gelang33.jpg',
'img/gelang34.jpg',
'img/gelang35.jpg',
'img/gelang36.jpg',
'img/gelang37.jpg',
'img/gelang38.jpg',
'img/gelang39.jpg',
'img/gelang40.jpg',
'img/gelang41.jpg',
'img/gelang42.jpg',
'img/gelang43.jpg',
'img/gelang44.jpg',
'img/gelang45.jpg',
'img/gelang46.jpg',
'img/gelang47.jpg',
'img/gelang48.jpg',
'img/gelang49.jpg',
'img/gelang50.jpg',
'img/gelang51.jpg',
'img/gelang52.jpg',
'img/gelang53.jpg'
    ];
    let currentIndex = 0;
  
    function changeBackgroundImage() {
      jumbotron.style.backgroundImage = `url(${images[currentIndex]})`;
      currentIndex = (currentIndex + 1) % images.length;
    }
  
    setInterval(changeBackgroundImage, 1000); // Ganti gambar setiap 5 detik
    changeBackgroundImage(); // Panggil fungsi untuk menetapkan gambar pertama kali
  });
  