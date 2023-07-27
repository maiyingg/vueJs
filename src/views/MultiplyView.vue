<template>
  <div>
    <h1>{{ msg }}</h1>
    <div>
      <input type="number" v-model="num1"> - <input type="number" v-model="num2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <button @click="calculate">click</button>
    </div><br>
    <div v-html="result"></div>
  </div>
</template>

<script>
// @ is an alias to /src

export default {
  name: 'App',
  data(){
    return{
        msg: "แสดงแม่สูตรคูณ",
           num1: 2,
           num2: 2,
           result: "",
    }
  },
  methods: {
        calculate(){
             this.result = '';  
            for(var x=1; x<=12; x++){
                for(var  i = this.num1; i <= this.num2; i++){
                    this.result += i+" x "+x+" = "+(i*x)+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                }
             this.result += "<br>";
            }
        }
    },
}
</script>



