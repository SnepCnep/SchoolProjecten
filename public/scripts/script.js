document.addEventListener('DOMContentLoaded', function() {
    const typewriter = document.querySelector('h1.writinganimation');
  
    function playTypewriterAnimation() {
      typewriter.classList.remove('deleting');
      typewriter.style.animation = 'typing 3.5s steps(40, end), blink-caret .75s step-end infinite';
  
      setTimeout(() => {
        typewriter.style.animation = 'none';
        typewriter.style.width = '100%';
        
        setTimeout(() => {
          typewriter.style.animation = 'deleting 2s steps(40, end) forwards';
          setTimeout(() => {
            typewriter.style.animation = 'none'; 
            typewriter.style.width = '0'; 
            setTimeout(playTypewriterAnimation, 200);
          }, 2500);
        }, 0); 
      }, 3500); 
    }
  
    playTypewriterAnimation(); 
  });