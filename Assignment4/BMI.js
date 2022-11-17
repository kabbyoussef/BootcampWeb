var rectangle={
height:0,
weight:0,
 area : function (){
   return this.height*this.weight;
    
}

}
rectangle.height=10
rectangle.weight=3


console.log("The area is "+rectangle.area());
