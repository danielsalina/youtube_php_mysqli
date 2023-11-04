$(function () {
  $('#task-result').hide();

  fetchTasks();

  let edit = false;

  $('#search').keyup(() => {
    if ($('#search').val()) {
      let search = $('#search').val();
      $.ajax({
        url: '../../app/controllers/TaskSearchController.php',
        data: { search },
        type: 'POST',
        success: function (response) {
          if (!response.error) {
            let tasks = JSON.parse(response);
            let template = ``;
            tasks.forEach((task) => {
              template += `<li class="task-item">${task.name}</li>`;
            });
            $('#task-result').show();
            $('#container').html(template);
          }
        },
      });
    }
  });

  $('#task-form').submit((e) => {
    e.preventDefault();
    const postData = {
      name: $('#name').val(),
      description: $('#description').val(),
      id: $('#taskId').val(),
    };

    const url = edit === false ? '../../app/controllers/AddTasksController.php' : '../../app/controllers/EditTaskController.php';

    $.ajax({
      url,
      data: postData,
      type: 'POST',
      success: function (response) {
        if (!response.error) {
          fetchTasks();
          $('#task-form').trigger('reset');
        }
      },
    });
  });

  function fetchTasks() {
    $.ajax({
      url: '../../app/controllers/TasksListController.php',
      type: 'GET',
      success: function (response) {
        const tasks = JSON.parse(response);
        let template = ``;
        tasks.forEach((task) => {
          template += `
                          <tr taskId="${task.id}">
                              <td class='text-center'>${task.id}</td>
                              <td class='text-center'>${task.name}</td>
                              <td class='text-center'>${task.description}</td>
                              <td class='text-center'>
                                  <button class="btn btn-danger task-delete">Delete</button>
                                  <button class="btn btn-warning task-item">Edit</button>
                              </td>
                          </tr>
                          `;
        });
        $('#tasks').html(template);
        edit = false; // Reset 'edit' to false after loading tasks
      },
    });
  }

  $(document).on('click', '.task-delete', () => {
    if (confirm('Are you sure you want to delete that task?')) {
      const element = $(this)[0].activeElement.parentElement.parentElement;
      const id = $(element).attr('taskId');
      $.post('../../app/controllers/DeleteTasksController.php', { id }, () => {
        fetchTasks();
      });
    }
  });

  $(document).on('click', '.task-item', () => {
    const element = $(this)[0].activeElement.parentElement.parentElement;
    const id = $(element).attr('taskId');
    let url = '../../app/controllers/GetATaskController.php';
    $.ajax({
      url,
      data: { id },
      type: 'POST',
      success: function (response) {
        if (!response.error) {
          const task = JSON.parse(response);
          $('#name').val(task.name);
          $('#description').val(task.description);
          $('#taskId').val(task.id);
          edit = true;
        }
      },
    });
  });
});
