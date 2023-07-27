<template>
  <div >
    <h1>{{ msg }}</h1>
    <div><input type="number" v-model="num1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button @click="calculate">click</button></div><br>
    <div class="show"><h1 v-html="result" align="left" ></h1></div>
  </div>
</template>

<script>
// @ is an alias to /src

export default {
  name: 'App',
  data(){
    return{
        msg: "แสดงดาว ◺",
           num1: 5,
           result: "",
    }
  },
  methods: {
        calculate(){
             this.result = '';  
            for(var x=1; x<=this.num1; x++){
                for(var  i = 1; i <= x; i++){
                    this.result += " * "+"&nbsp;";
                }
             this.result += "<br>";
            }
        }
    },
  
}
</script>



