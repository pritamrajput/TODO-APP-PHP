'use strict';

const deleteButton = document.querySelectorAll("#delete-btn");


for (let i = 0; i < deleteButton.length; i++) {

   deleteButton[i].addEventListener('click',function (event) {
      const confirm = window.confirm("Are you sure, you want to delete this task ?");
      if(!confirm){
        event.preventDefault();
      }
   })
    
}