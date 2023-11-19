
      // Adicione um script JavaScript para ajustar o layout em telas pequenas
      function ajustarLayout() {
        if (window.innerWidth <= 1102) { // Verifique se a largura da tela é menor ou igual a 576px (tamanho de um celular)
          const imagens = document.querySelectorAll('.imagem');
          imagens.forEach(imagem => {
            imagem.style.marginBottom = '30px'; // Adicione margem inferior entre as imagens
          });
        } else {
          const imagens = document.querySelectorAll('.imagem');
          imagens.forEach(imagem => {
            imagem.style.marginBottom = '50px'; // Remova a margem inferior em telas maiores
          });
        }
      }
  
      // Chame a função para ajustar o layout quando a página carregar e redimensionar a tela
      window.addEventListener('load', ajustarLayout);
      window.addEventListener('resize', ajustarLayout);