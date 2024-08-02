    // Select the paragraph element
    let paragraph = document.getElementById('paragraph');
    let spans = [];

    // Convert the text content of the paragraph into individual spans
    if (paragraph) {
      let htmlString = '';
      let pArray = paragraph.textContent.split('');
      for (let i = 0; i < pArray.length; i++) { 
        htmlString += `<span>${pArray[i]}</span>`;
      } 
      paragraph.innerHTML = htmlString;
      spans = [...document.querySelectorAll('span')];
    }

    // Function to reveal spans based on scroll position
    function revealSpans() {
      for (let i = 0; i < spans.length; i++) {
        if (spans[i].parentElement.getBoundingClientRect().top < window.innerHeight / 2) {
          let { left, top } = spans[i].getBoundingClientRect();

          top = top - (window.innerHeight * 0.4);
          let opacityValue = 1 - ((top * 0.01) + (left * 0.001));
          opacityValue = opacityValue < 0.1 ? 0.1 : opacityValue;
          opacityValue = opacityValue > 1 ? 1 : opacityValue.toFixed(3);
          spans[i].style.opacity = opacityValue;
        }
      }
    }

    // Add scroll event listener
    window.addEventListener('scroll', () => {
      revealSpans();
    });

    // Initial call to revealSpans
    revealSpans(); 