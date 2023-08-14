'use strict';

const deleteButton = document.querySelectorAll("#delete-btn");
let inputHidden = document.querySelectorAll("#custId");
let doneinputHidden = document.querySelectorAll("#donecustId");
const checkBoxes = document.querySelectorAll(".delete-checkbox");
let isCheckboxChecked = false;
const deleteAllButton = document.querySelector(".delete-all");
const doneAllButton = document.querySelector(".done-all");
let taskArray = [];
let doneTaskArray = [];




deleteAllButton.addEventListener('click',function(event){
    for (let i = 0; i < checkBoxes.length; i++){
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
    
  }
  
})

doneAllButton.addEventListener('click',function(event){
    for (let i = 0; i < checkBoxes.length; i++){
       if(checkBoxes[i].checked){
          doneTaskArray.push(checkBoxes[i].value);
       }
    else if(!checkBoxes[i].checked){
      const index = doneTaskArray.indexOf(checkBoxes[i].value);
      if(index > -1){
        doneTaskArray.splice(index,1);
      }
    }
    doneinputHidden[0].value = doneTaskArray; 
  }
  
})

// taskArray.length ? deleteAllButton.removeAttribute("disabled"): deleteAllButton.setAttribute("disabled",'true');



for (let i = 0; i < deleteButton.length; i++) {
   deleteButton[i].addEventListener('click',function (event){
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