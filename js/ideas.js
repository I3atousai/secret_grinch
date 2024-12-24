


function open_box(id) {
    let coverp = document.getElementById('box_top_'+id);
    coverp.style.animationName = 'open_box';
    coverp.style.animationFillMode = 'forwards';
     coverp.style.animationDuration = '1.5s'
}

function close_box(id) {
   
    let cover = document.getElementById('box_top_'+id);
    cover.style.animationName = 'close_box';
    cover.style.animationFillMode = 'initial';
cover.style.animationDuration = '1.5s'

}