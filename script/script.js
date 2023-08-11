'use strict';

const deleteButton = document.querySelectorAll("#delete-btn");
let inputHidden = document.querySelectorAll("#custId");
const checkBoxes = document.querySelectorAll("input[type='checkbox']");
let isCheckboxChecked = false;
const deleteAllButton = document.querySelector(".delete-all");
let taskArray = [];


for (let i = 0; i < checkBoxes.length; i++){
  checkBoxes[i].addEventListener('click',function (event){
    if(checkBoxes[i].checked){
        taskArray.push(checkBoxes[i].value);
    }
    else if(!checkBoxes[i].checked){
      const index = taskArray.indexOf(checkBoxes[i].value);
      if(index > -1){
        taskArray.splice(index,1);
      }
    }
    inputHidden[0].value = taskArray;
    
    taskArray.length ? deleteAllButton.removeAttribute("disabled"): deleteAllButton.setAttribute("disabled",'true');
  }) 
}


for (let i = 0; i < deleteButton.length; i++) {
   deleteButton[i].addEventListener('click',function (event) {
      const confirm = window.confirm("Are you sure, you want to delete this task ?");
      if(!confirm){
        event.preventDefault();
      }
   })
    
}

deleteAllButton.addEventListener('click',function (event) {
  const confirm = window.confirm("Are you sure, you want to delete these tasks ?");
  if(!confirm){
        event.preventDefault();
      }
})