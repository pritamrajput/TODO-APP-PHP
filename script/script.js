'use strict';

const deleteButton = document.querySelectorAll("#delete-btn");
let inputHidden = document.querySelectorAll("#custId");
let doneinputHidden = document.querySelectorAll("#donecustId");
const checkBoxes = document.querySelectorAll(".delete-checkbox");
const deleteAllButton = document.querySelector(".delete-all");
const doneAllButton = document.querySelector(".done-all");
let taskArray = [];
let doneTaskArray = [];



function updateTaskArray(checkBoxes, taskArray, inputHidden){
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
}


deleteAllButton.addEventListener('click',function(event){
  updateTaskArray(checkBoxes, taskArray, inputHidden);
  
})

doneAllButton.addEventListener('click',function(event){
  updateTaskArray(checkBoxes, doneTaskArray, doneinputHidden);
  
})


//function for confirm winow dialog box
function confirmWindow(event) {
  const confirm = window.confirm("Are you sure, you want to delete this task ?");
      if(!confirm){
        event.preventDefault();
      }
}


for (let i = 0; i < deleteButton.length; i++) {
   deleteButton[i].addEventListener('click',function (event){
      confirmWindow(event);
   })  
}

deleteAllButton.addEventListener('click',function (event) {
      confirmWindow(event);
})