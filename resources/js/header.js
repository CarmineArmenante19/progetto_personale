// Welcome animation
let div_custom = document.querySelector('.div_custom');
if (div_custom) {
  for (let i = 1; i <= 100; i++){
    let dot = document.createElement('div');
    dot.classList.add('element');
    div_custom.appendChild(dot);
  }
  
  let dot_all = document.querySelectorAll('.element');
  let animation = anime.timeline({
    targets: dot_all,
    easing: 'easeInOutExpo',
    loop: true,
    delay: anime.stagger(100,{grid:[10,10],from: 'center'})
  })
  
  animation
  .add({
     rotateZ:180,
     translateY: anime.stagger(-20,{grid:[10,10],from:'center',axis:'y'}),
     translateX: anime.stagger(-20,{grid:[10,10],from:'center',axis:'x'}),
     opacity:1,
    })
  
    .add({
      borderRadius : 50,
    })  
    
    .add({
      scale:0.2,
      opacity:0.2,
    })
  
    .add({
      rotateZ:180,
      translateY: anime.stagger(0,{grid:[10,10],from:'center',axis:'y'}),
      translateX: anime.stagger(0,{grid:[10,10],from:'center',axis:'x'}),
      opacity:1,
     })
  
    .add({
      scale:1,
      borderRadius:0,
    })
  
    .add({
     rotateZ:-90,
    })
  }  