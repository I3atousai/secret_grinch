async function download_file(file) {
  const formData = new FormData()
  formData.append('file', file)
  return $.ajax({
      url: `../Service/download_PFPfile.php`,
      method: "post",
      processData: false,
      contentType: false,
      data: formData,
      dataType: "json"
  })
}

const avatar_input = document.getElementById('avatar_input')

avatar_input.onchange = change_avatar

function change_avatar() {
    let file = avatar_input.files[0]
    let img = avatar_input.nextElementSibling;
    download_file(file)
        .then(data => {
            img.src = data.url
        })
        .catch(err => console.log(err))
}



let box_amount = getCookie('box_amount');
console.log(box_amount);



let list_button_id = 'box_users_show_';

let list_div_id = 'box_users_';

function toggleVisibility(box_number) {
  // unset notification, box_number_9999 button openes notification list
  if (box_number == 9999) {
      const formDataNoted = new FormData()
  formDataNoted.append("noted", true)
  $.ajax({
    url: `../Service/unset_notification.php`,
    method: "post",
    processData: false,
    contentType: false,
    data: formDataNoted,
    dataType: "json"
})
  }
  
  let element = document.getElementById('box_users_' + box_number);
    if (element.style.display === 'none') {
        element.style.display = 'block';
    } else {
        element.style.display = 'none';
    }
}
function toggleVisibilityChange() {
   element = document.getElementById('notification_button').classList.toggle('hidden');
   element = document.getElementById('user_name').classList.toggle('hidden');
   element = document.getElementById('avatar_input').classList.toggle('hidden');
   element = document.getElementById('commit_change_name').classList.toggle('hidden');
   element = document.getElementById('name_form').classList.toggle('hidden');
   
}

// let show_list = document.getElementById('box_users_show_1').onclick = toggleVisibility();

function clearLocalStorage() {
  localStorage.clear();
  
  // location.reload();
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


  const formDataChange = new FormData()

  function toggleState(id, state, box_id) {
    const id_oped = document.getElementById("change_state_open_"+id)
    const id_close = document.getElementById("change_state_close_"+id)
console.log(box_id);
console.log(state);

      formDataChange.append("id", Number(box_id))
      formDataChange.append("state", Number(state))
  
    
      id_oped.classList.toggle('hidden')
      id_close.classList.toggle('hidden')
      
      $.ajax({
          url: `../Service/box_state_update.php`,
          method: "post",
          processData: false,
          contentType: false,
          data: formDataChange,
          dataType: "json"
      })
    }


function push_cahnges() {
  let change = document.getElementById('change_name').value
      formDataChange.append('name', change)
    $.ajax({
        url: `../Service/change_name.php`,
        method: "post",
        processData: false,
        contentType: false,
        data: formDataChange,
        dataType: "json"
    })
}


function del_user_number_(i, u, user_id,  box_id,) {
  
  const formDataDelUser = new FormData()
  formDataDelUser.append("user_id", Number(user_id))
  formDataDelUser.append("box_id", Number(box_id))


  document.getElementById('pfp_'+String(i)+String(u)).classList.toggle('hidden')
  document.getElementById('user_number_'+String(i)+String(u)).classList.toggle('hidden')
  document.getElementById('del_user_number_'+String(i)+String(u)).classList.toggle('hidden')
  document.getElementById('hr_'+String(i)+String(u)).classList.toggle('hidden')
  
  $.ajax({
      url: `../Service/del_usr_from_box.php`,
      method: "post",
      processData: false,
      contentType: false,
      data: formDataDelUser,
      dataType: "json"
  })
}


function work_modal(id_modal) {
  const modal = document.getElementById(id_modal)
  if (modal) {
      modal.classList.toggle('active')
  }
}
