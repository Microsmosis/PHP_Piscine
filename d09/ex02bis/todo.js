var id_counter = 0;
$('#new').click(newTask);

if (document.cookie && document.cookie != "")
{
	let splitted_cookie = document.cookie.split(';');
	for (let i = 0; i < splitted_cookie.length; i++)
	{
		let key_value = splitted_cookie[i].split("=");
		addOldTask(key_value[0].trim(), key_value[1]);
		id_counter++;
	}
}

function newTask ()
{
	let new_todo = prompt("Type in your new task.");
	if (new_todo.indexOf(';') >= 0)
	{
		new_todo = new_todo.replaceAll(';', '✅');
	}
	if (new_todo === "" || new_todo === null)
	{
		return ;
	}
	else
	{
		addTask(new_todo, id_counter);
		addCookie(new_todo, id_counter);
		id_counter++;
	}
}

function deleteTask (id)
{
	if(confirm("You are removing a task, are you sure?"))
	{
		$('#' + id).remove();
		document.cookie = id + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
	}
}

function addOldTask(id_counter, new_todo)
{
	let full_id = id_counter;
	let newnew = $('#ft_list').prepend('<div id="'+ full_id + '" onclick="deleteTask(this.id)">' + new_todo + '</div>');
}

function addTask(new_todo, id_counter, )
{
	let full_id = id_counter + new_todo;
	let newnew = $('#ft_list').prepend('<div id="' + full_id + '" onclick="deleteTask(this.id)">' + new_todo + '</div>');
}

function addCookie(new_todo, id_counter, )
{
	document.cookie = id_counter + new_todo  + "=" + new_todo + "; expires=Thu, 18 Dec 2050 12:00:00 UTC; secure; path=/;";
}