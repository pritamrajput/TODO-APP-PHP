'use strict';

const deleteButton = document.querySelectorAll("#delete-btn");

for (let i = 0; i < deleteButton.length; i++) {
   deleteButton[i].addEventListener('click',function (event) {
      const confirm = window.confirm("Are you sure ?");
      if(!confirm){
        console.log(event.target.getAttribute("href"));
        event.preventDefault();
      }
   })
    
}