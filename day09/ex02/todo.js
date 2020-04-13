function  delete_balise(id)
{
  var parent = document.getElementById("nothing");
  var child = document.getElementById(id);
  parent.removeChild(child);
}
function  add_balise(new_todo)
{
  var insert = document.getElementById('button_new');
  var parent = document.getElementById('nothing');
  var element = document.createElement('div');
  var text_case = document.createElement('div');
  var close_button = document.createElement('button');
  close_button.className = "delete";
  text_case.className = "ft_list";
  element.className = "case";
  close_button.textContent = 'X';
  text_case.textContent = new_todo;
  element.appendChild(close_button);
  element.insertBefore(text_case, close_button);
  if (parent.lastChild.id)
  {
    var id = parseInt(parent.lastChild.id, 10);
    id = id + 1;
    element.id = id.toString();
  }
  else
    element.id = "1";
  parent.appendChild(element);
  close_button.value = element.id;
  close_button.onclick = function(){delete_balise(close_button.value);};
}

function  record_new()
{
  var new_todo = prompt("Please enter your new Todo!");
  add_balise(new_todo);
  //add_cookie(new_todo);
}
var res = document.cookie.split(";");
var i = 0;
while (res[i])
{
  //add_balises(res[i]);
  i++;
}
