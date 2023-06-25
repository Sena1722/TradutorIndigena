document.addEventListener('DOMContentLoaded', function() {
    let currentIndex = 0;
    const images = ['','/home/sena/Área de Trabalho/Tradutor_Indigena/.vscode/img/amazonia.png',''];
    const imageElement = document.getElementById('image');
    const prevButton = document.getElementById('btn-prev');
    const nextButton = document.getElementById('btn-next');
  
    prevButton.addEventListener('click', function() {
      changeImage(-1);
    });
  
    nextButton.addEventListener('click', function() {
      changeImage(1);
    });
  
    function changeImage(direction) {
      currentIndex += direction;
      if (currentIndex < 0) {
        currentIndex = images.length - 1;
      } else if (currentIndex >= images.length) {
        currentIndex = 0;
      }
      imageElement.src = images[currentIndex];
    }
  });
  