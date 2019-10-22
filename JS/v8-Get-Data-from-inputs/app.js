//START OBJECT todos
let todos = {

  //MY TODO LIST - PROPERTY
  list : [

    {
      text: "Learn HTML5",
      completed: true
    },
    {
      text: "Learn CSS",
      completed: false
    },
    {
      text: "Learn JS",
      completed: false
    },
    {
      text: "Learn PHP",
      completed: true
    }

  ],

  //DISPLAY TODOS - METHOD
  displayTodos: function() {

    if(this.list.length == 0) {
      console.log("You don't have any todos, add some!");
    }

    this.list.forEach(function(item) {
      let completedStr = (item.completed) ? "(x)" : "( )";
      console.log(completedStr, item.text);
    });
    
  },

  //ADD TODO
  addTodo: function(todoText) {

    let newTodo = {
      text: todoText,
      completed: false
    }

    this.list.push(newTodo);
    this.displayTodos();
  },

  //CHANGE TODO
  changeTodo: function(index, newText) {
    this.list[index].text = newText;
    this.displayTodos();
  },

  //DELETE TODO
  deleteTodo: function(index) {
    this.list.splice(index, 1);
    this.displayTodos();
  },

  //TOGGLE COMPLETED
  toggleTodo: function(index) {
  
    let currentStatus = this.list[index].completed; //true or false
    this.list[index].completed = ! currentStatus;
    this.displayTodos();

  },

  //TOGGLE ALL !
  toggleAll: function() {

    //Completed items INIT
    let completedItems = 0;
    
    //How many todos I have ?
    let totalTodos = this.list.length; //console.log("Total todos:", totalTodos);

    //1. Check what items are completed (true)
    this.list.forEach(function(item) {
      if(item.completed) {
        completedItems++; //or... completedItems += 1;
      }
    });
    // console.log("Completed items:", completedItems);

    //2. IF everything is completed ==> check them all 
    if(completedItems == totalTodos) {
      this.list.forEach(function(item) {
        item.completed = false;
      });
    }
    // Check them all
    else {
      this.list.forEach(function(item) {
        item.completed = true;
      });
    }

    this.displayTodos();

  }


}; // END OBJECT todos


//START OBJECT handlers
let htmlConnections = {
  
  

};


let handlers = {

  // add to do handlers
  addTodo: function(){
    const inputAdd = document.getElementById('btnDisplay');
      if(inputAdd.value !== '') {
        todos.addTodo(inputAdd.value);
        inputAdd.value = '';
      }
      else 
      {
        alert("The input text cannot be empty!")
      }
  },

  // ToggleToDo handlers

  toggleTodo: function(){
    const inputToggleIndex = document.getElementById('btnToggleAll');
    if(inputToggleIndex.value !== '') {
      todos.toggleTodo(inputToggleIndex.value);
      inputToggleIndex.value = '';
    }
    else 
    {
      alert("The index can't be empty!");
    }
    
    
  }

};

// LINK YOUR HTML buttons
//const btnDisplay = document.getElementById('btnDisplay');
//const btnToggleAll = document.getElementById('btnToggleAll');



// btnDisplay.addEventListener('click', function(){
//   todos.displayTodos();
//   // console.log("===============");
// });

// btnToggleAll.addEventListener('click', function() {
//   todos.toggleAll();
//   // console.log("===============");
// });


// Add TODOS btn and input
// const btnAdd = document.getElementById('btnAdd');
// const inputAdd = document.getElementById('inputAdd');


// btnAdd.addEventListener('click', function(){
//   if(inputAdd.value !== '') {
//     todos.addTodo(inputAdd.value);
//     inputAdd.value = '';
//   }
//   else 
//   {
//     alert("The input!")
//   }


// });

// // TOGGLE TODOS btn and input
// const btnToggle = document.getElementById('btnToggle');
// btnToggle.addEventListener('click', function(){
//   const inputToggleIndex = document.getElementById('inputToggleIndex');
  // if(inputToggleIndex.value !== '') {
  //   todos.toggleTodo(inputToggleIndex.value);
  //   inputToggleIndex.value = '';
  // }
  // else 
  // {
  //   alert("The index can't be empty!");
  // }


// });













// $("#btnDisplay").on('click', function () {
//   todos.toggleAll();
// });
// // What we've missed  (=== equality stricte)
// // 1. Stricte comparisen
// let num = "3";
// if (num === 3) {
//   console.log("True");
// } 
// else 
// {
//   console.log("False");
// }

// let bool = 1;
// if (bool === true) {
//   console.log("True");
// } 
// else 
// {
//   console.log("False");
// }

// // You can write conditions like this :
// if(true) console.log("True");
// else console.log("False");




