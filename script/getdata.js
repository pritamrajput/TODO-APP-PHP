'use strict';

const searchBtn = document.getElementsByClassName("search-btn");
const searchInput = document.getElementById("search-input");
const taskTable = document.getElementById("table-body");
const taskDate = document.getElementById("task-date");

searchBtn[0].addEventListener('click',function () {
    const searchString = searchInput.value;
    taskTable.innerHTML = '';
    if(searchString.trim !== ''){
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if(xhr.readyState === 4 && xhr.status === 200){
               const searchedTaskList = JSON.parse(this.responseText);
               console.log(searchedTaskList);
               for (let i = 0; i < searchedTaskList.length; i++) {
                 taskTable.innerHTML+=`<tr id="ajax-search-table" class="my-2">
					<td class="row1">
                    	<input class="delete-checkbox" type="checkbox" name ="deleteId[]" value = '.$row['id']."/>
                    	<div id="task-name" style="'.$checkListStyle.'">${searchedTaskList[i].list}</div>
                    	<div id="task-date" style="font-size: 10px;color: #899499; position:absolute; right:200px;">${searchedTaskList[i].date}</div>
                    </td>
               <td class="done-column" style="width:10%;">
						<form class="checked-form" action="taskUpdate.php?ID='.$row['id'].'&date='.$date.'&check='.$row['done'].'&action=0&search='. $searchText.'" method="post">
							<input type="submit" value='Done' class="btn btn-outline-success" id="done-btn">
						</form>
					</td>
               <td class="delete-column" style="width:10%;">
						<form action="taskUpdate.php?ID='.$row['id'].'&date='.$date.'&action=-1&search='. $searchText.'" method="post">
						    <input type="submit" value="Delete" class="btn btn-outline-danger" id="delete-btn">
						</form>
               </td>
				</tr>`;
               }
            }
        }

        xhr.open("GET","fetch.php?search="+searchString ,true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send();
    }
})