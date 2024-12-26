let user_amount = getCookie('user_amount');
setNames();


function setNames() {
for (let i = 0; i < user_amount; i++) {
        // console.log(localStorage['box_field_' + (i+1)]);
        let name_so_set = localStorage['box_field_' + (i+1)];
        let id_to_target = 'box_field_' + (i+1);
        if(name_so_set) {
            document.getElementById(id_to_target).value = name_so_set;
        }
    }

}

document.getElementById('btn_submit').onmouseover = function close_box() {
    
  let cover = document.getElementById('box_roof');
  cover.style.animationName = 'close_box';
  cover.style.transitionTimingFunction = 'ease-in';
  cover.style.animationFillMode = 'forwards';
    cover.style.animationDuration = '1.5s'

  }
document.getElementById('btn_submit').onmouseleave = function open_box() {
    
  let cover = document.getElementById('box_roof');
  cover.style.animationName = 'open_box';
  cover.style.transitionTimingFunction = 'ease-out';
  cover.style.animationFillMode = 'forwards';
    cover.style.animationDuration = '1.5s'

  }



function saveName(name, tag_id) {
    // console.log(name.value);
    // console.log(tag);
    localStorage.setItem(('box_field_' + tag_id), name.value);

    
}


function getCookie(cname) {
    let name = cname + "=";
    let ca = document.cookie.split(';');
    for(let i = 0; i < ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }