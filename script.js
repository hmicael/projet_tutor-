function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
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

document.getElementById('alert_notif').style.display = 'None';

// check the time to pop up the notification
setInterval(function() {
    let currentdate = new Date(); 
    let time = (currentdate.getHours() + ":" + currentdate.getMinutes()).split(':');
    let notif_time = getCookie("notif_time").split(':');
    let undoneTasks = document.getElementById('undoneTasks').innerHTML;
    if (parseInt(notif_time[0]) == parseInt(time[0])
            && parseInt(notif_time[1]) == parseInt(time[1])) {
        if (document.getElementById('alert_notif')) {
            document.getElementById('alert_notif_msg').innerHTML = undoneTasks;
            document.getElementById('alert_notif').style.display = 'block';
        }
    }
}, 1000);