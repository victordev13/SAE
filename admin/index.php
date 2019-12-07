<?php
require_once'../functions.php';
require_once'../includes/header.php';
ValidaSessao("logado", 0);

?>
<!--Formulario de agendamento -->
<div class="modal" tabindex="-1" role="dialog" id="agendamento">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Novo agendamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <div class="modal-body">
      <div class="form-row">
        <div class="col">
          <label for="inputEmail4">Título</label>
          <input type="text" class="form-control" placeholder="First name">
        </div>
        <div class="col">
          <label for="inputEmail4">Email</label>
          <input type="text" class="form-control" placeholder="Last name">
        </div>
      </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Agendar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Fim --> 
<div class="container mt-5">
    <?php
        if(isset($_GET['erro'])){
            echo "<div class='alert alert-danger alerta-sm' role='alert'>";
            echo $_GET['erro'];
            echo "</div>";
            unset($_GET['erro']);
        }
        if(isset($_GET['m'])){
            echo "<div class='alert alert-success alerta-sm' role='alert'>";
            echo $_GET['m'];
            echo "</div>";
            unset($_GET['m']);
        }
    ?>
    <div id='calendar'></div>   
</div>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
    locale: 'pt-br',
      plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      defaultDate: '2019-08-12',
      navLinks: true, // can click day/week names to navigate views
      selectable: true,
      selectMirror: true,
      select: function(arg) {
        //****************Ao clicar na data ativa o popup Bootstrap e alimenta o campo de data
        $('#agendamento').modal('show');
        //******************************PEGAR DATA DA VARIAVEL arg.start  E INSERIR NO FORMULARIO DO BOOTSTRAP.
        
        /*var title = prompt('Título do Evento:');
        var form = 1;
        //exibir popup com formulario onde os campos serão pegos por POST e enviados para o banco de dados, ao recarregar a página serão buscados e exibidos
        if (form) {
          calendar.addEvent({
            title: "teste",
            start: arg.start,
            end: arg.end,
            allDay: arg.allDay
          })
        }
        */
        calendar.unselect()
      },
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: [
        {
          title: 'All Day Event',
          start: '2019-08-01'
        },
        {
          title: 'Long Event',
          start: '2019-08-07',
          end: '2019-08-10'
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2019-08-09T16:00:00'
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2019-08-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2019-08-11',
          end: '2019-08-13'
        },
        {
          title: 'Meeting',
          start: '2019-08-12T10:30:00',
          end: '2019-08-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2019-08-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2019-08-12T14:30:00'
        },
        {
          title: 'Happy Hour',
          start: '2019-08-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2019-08-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          start: '2019-08-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2019-08-28'
        }
      ]
    });

    calendar.render();
  });

</script>
<?php
include_once'../includes/footer.php';
?>