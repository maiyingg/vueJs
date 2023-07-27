<template>
    <div class="card">
        <div class="card-header  text-light">สมัครสมาชิก</div>
        <div class="card-body">
            <form v-on:submit.prevent="saveData">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="">คำนำหน้าชื่อ</label>
                        <select class="form-control text-center" v-model="fData.stdPrefix">
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <label for="">ชื่อ</label>
                        <input type="text" class="form-control" v-model="fData.stdFname" required>
                    </div>
                    <div class="col-sm-2">
                        <label for="">สกุล</label>
                        <input type="text" class="form-control" v-model="fData.stdLname" required>
                    </div>
                    <div class="col-sm-2">
                        <label for="">วัน/เดือน/ปีเกิด</label>
                        <input type="date" class="form-control" v-model="fData.bdate" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <label for="">email</label>
                        <input type="email"  class="form-control" v-model="fData.stdemail"  required>
                    </div>
                    <div class="col-sm-2">
                        <label for="">รหัสผ่าน</label>
                        <input type="password" class="form-control" v-model="fData.stdPassw" v-on:input="Cpass" required>
                    </div>
                    <div class="col-sm-2">
                        <label for="">รหัสผ่าน(อีกครั้ง)</label>
                        <input type="password" class="form-control" v-model="fData.stdPassw2" v-on:input="Cpass" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="">ทีอยู่</label>
                        <input type="text" class="form-control" v-model="fData.stdAddr"  required>
                    </div>
                    <div class="col-md-2">
                        <label for="">จังหวัด</label>
                        <select class="form-select" v-model="fData.stdProvince" @change="getDistrict(this.fData.stdProvince)">
                            <option v-for="province in provinces" :key="province.provinceID" :value="province.provinceID">
                                {{province.provinceThaiName}}
                            </option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="">อำเภอ</label>
                         <select class="form-select" v-model="fData.stdDistict" @change="getsubDistrict(this.fData.stdDistict)">
                             <option v-for="district in districts" :key="district.districtID" :value="district.districtID">
                                {{district.districtThaiName}}
                            </option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="">ตำบล</label>
                         <select class="form-select" v-model="fData.stdSubDistict"  @change="getzipcode($event)">
                            <option v-for="subdistrict in subdistricts" :key="subdistrict.zip_code" :value="subdistrict.zip_code">
                                {{subdistrict.subDistrictThaiName}}
                            </option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="">รหัสไปรษณี</label>
                        <input type="text" class="form-control" v-model="fData.stdZipCode" required>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                         <label for="">หมายเลขโทรศัพท์</label>
                        <input type="text" class="form-control" v-model="fData.stdPhone" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-2">
                         <button type="submit" class="btn btn-outline-success" v-bind:disabled="Open"><font-awesome-icon icon="fa-solid fa-save"/></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <table class="table">
                <thead>
                    <tr>
                        <th width="10%">email</th>
                        <th width="10%">Name</th>
                        <th width="10%">BrithDay</th>
                        <th width="50%">Address</th>
                        <th width="10%">PhoneNumber</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="std in students" :key="std.id" :value="std.id">
                        <td>{{std.stdemail}}</td>
                        <td>{{std.stdPrefix+" "+std.stdFname+" "+std.stdLname}}</td>
                        <td>{{std.bdate}}</td>
                        <td>{{std.stdAddr+" "+std.subDistrictThaiName+" "+std.districtThaiName+" "+std.provinceThaiName+" "+std.stdZipCode}}</td>
                        <td>{{std.stdPhone}}</td>
                        <td><button @click="edit(std.id)" class="btn btn-outline-warning btn-sm me-2"><font-awesome-icon icon="fa-solid fa-edit"/></button>
                            <button @click="del(std.id)" class="btn btn-outline-danger btn-sm me-2"><font-awesome-icon icon="fa-solid fa-trash"/></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
  name: "App",
 data(){
    return{
        fData:{
            stdemail: "",
            prefix: "",
            stdFname:"",
            stdLname:"",
            bdate:"",
            stdPassw:"",
            stdPassw2:"",
            stdAddr:"",
            stdZipCode: [],
            stdProvince:"",
            stdDistict:"",
            stdSubDistict:"",
            stdPhone:""
        },
        provinces: [],
        districts: [],
        subdistricts: [],
        Open: true,
        students: []
    }
 },
 methods: {
    async saveData(){
         await axios({
            method: "POST",
            url: "http://localhost:8000/student",
            headers: {
                'Content-type':'multipart/form-data',
            },
            data: JSON.stringify(this.fData)
        }).then(resp =>{
            console.log(resp.data)
        })
        .catch(error => {
            console.error(error)
        })                      
    },
   async  getProvince(){
            await axios({
            method: "GET",
            url: "http://localhost:8000/province",
            headers: {
                'Content-type':'application/json',
            }
        })
        .then(resp =>{
            this.provinces = resp.data.data
        })
        .catch(error => {
            console.error(error)
        })
    },
    async  getDistrict(id){
            await axios({
            method: "GET",
            url: "http://localhost:8000/districts/"+id,
            headers: {
                'Content-type':'application/json',
            }
        })
        .then(resp =>{
            this.districts = resp.data.data
        })
        .catch(error => {
            console.error(error)
        })
    },
    async  getsubDistrict(id){
            await axios({
                method: "GET",
                url: "http://localhost:8000/subdistrict/"+id,
                headers: {
                    'Content-type':'application/json',
                }
            })
            .then(resp =>{
                this.subdistricts = resp.data.data
            })
            .catch(error => {
                console.error(error)
            })
    },
    getzipcode(id){
         console.log(id)  
        this.fData.stdZipCode = this.subdistricts[id.target.selectedIndex].zip_code
    },
    Cpass(){
         if(this.fData.stdPassw.length >= 8){
            if(this.fData.stdPassw == this.fData.stdPassw2){
                this.Open = false;
            }
         }
    },
    async getstudent(){
         await axios({
                method: "GET",
                url: "http://localhost:8000/student",
                headers: {
                    'Content-type':'application/json',
                }
            })
            .then(resp =>{
                this.students = resp.data.data
                console.log(this.students)
            })
            .catch(error => {
                console.error(error)
            })
    }, 
    async edit(id){
         var idx = this.students.findIndex(item=>item.id == id);
         this.getDistrict(this.students[idx].stdProvince);
         this.getsubDistrict(this.students[idx].stdDistict);
         this.fData.stdemail = this.students[idx].stdemail
         this.fData.stdPrefix = this.students[idx].stdPrefix
         this.fData.stdFname = this.students[idx].stdFname
         this.fData.stdLname = this.students[idx].stdLname
         this.fData.bdate = this.students[idx].bdate
         this.fData.stdPassw = this.students[idx].stdPassw
         this.fData.stdPassw2 = this.students[idx].stdPassw
         this.fData.stdAddr = this.students[idx].stdAddr
         this.fData.stdPhone = this.students[idx].stdPhone
         this.fData.stdProvince = this.students[idx].stdProvince
         this.fData.stdDistict = this.students[idx].stdDistict
         this.fData.stdSubDistict  =  this.students[idx].stdSubDistict
         this.fData.stdZipCode  =  this.students[idx].stdZipCode
         this.fData.stdPhone = this.students[idx].stdPhone
         this.Open = false;
           await axios({
                method: "GET",
                url: "http://localhost:8000/student/update/"+id,
                headers: {
                    'Content-type':'application/json',
                },
            })
            .then(resp =>{
                this.getstudent()
                this.students = resp.data.data
                console.log(resp)
            })
            .catch(error => {
                console.error(error)
            })
    },
    async del(id){
         await axios({
                method: "GET",
                url: "http://localhost:8000/student/delete/"+id,
                headers: {
                    'Content-type':'application/json',
                },
            })
            .then(resp =>{
                this.getstudent()
                this.students = resp.data.data
                console.log(resp)
            })
            .catch(error => {
                console.error(error)
            })
    },
   
 },
 created(){
    this.getProvince()
    this.getstudent()
 },
}
</script>