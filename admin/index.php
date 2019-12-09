<?php
require_once'../functions.php';
require_once'../includes/header.php';
require_once'../classes/agendamento.class.php';
ValidaSessao("logado", 0);


if(isset($_POST)){
  if(isset($_POST['agendar'])){
    $usuario = $_SESSION['usuario'];
    $data = tratarString($_POST['data']);
    $equipamento = tratarString($_POST['equipamento']);
    $inicio = tratarString($_POST['inicio']);
    $fim = tratarString($_POST['fim']);
    $observacao = tratarString($_POST['observacao']);

    $cadastro = Agendamento::Cadastrar($usuario, $data, $equipamento, $inicio, $fim, $observacao);
    if($cadastro){
      
    }else{
      
    }
  }
}
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
          <label for="user">Usuário</label>
          <input type="text" class="form-control" id="user" name="user" value="<?php echo $_SESSION['usuario'] ?>" readonly="">
        </div>
        <div class="col">
          <label for="data">Data</label>
          <input type="date" class="form-control" id="data" name="data" readonly="">
        </div>
      </div>
      <div class="form-row mt-3">
        <div class="col">
          <label for="equipamento">Equipamento</label>
          <select id="equipamento" class="form-control" name="equipamento" required="">
            <option>Selecione...</option>
             <option value='0'>Datashow</option>
             <option value='1'>Notebook</option>
             <option value='2'>Caixa de Som</option>
          </select>
        </div>
        </div>
       <div class="form-row mt-3">
        <div class="col">
          <label for="inicio">Inicio</label>
          <select id="inicio" class="form-control" name="inicio" required="">
             <option value='1'>Aula 1</option>
             <option value='2'>Aula 2</option>
             <option value='3'>Aula 3</option>
             <option value='4'>Aula 4</option>
          </select>
        </div>
          <div class="col">
            <label for="fim">Fim</label>
            <select id="fim" class="form-control" name="fim" required="">
              <option value='1'>Aula 1</option>
              <option value='2'>Aula 2</option>
              <option value='3'>Aula 3</option>
              <option value='4'>Aula 4</option>
            </select>
          </div>
        </div>
        <div class="form-row mt-3">
        <div class="col">
          <label for="observacao">Observação</label>
          <textarea class="form-control" id="observacao" name="observacao" rows="1"></textarea>
        </div>
        </div>
      </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="agendar">Agendar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
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
    timeZone: 'UTC',
      plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      navLinks: true, // can click day/week names to navigate views
      selectable: true,
      selectMirror: true,
      select: function(arg) {
        //****************Ao clicar na data ativa o popup Bootstrap e alimenta o campo de data
        $('#agendamento').modal('show');
        $('#data').val(arg.startStr);
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