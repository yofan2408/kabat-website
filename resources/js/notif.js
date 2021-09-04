function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
    data :{
        message: "hello",
    }
});
