function validateEmail(str)
{
    var t=1;
    str =document.getElementById('email").value;
    if(document.getElementById('email').value=="")
    {
        document.getElementById("txtHint").innerHTML="Enter Email";

    }
    var res = str.split('@');
    if(str.split('@').length!=2)
    {
        document.getElementById("txtHint").innerHTML="zero @ OR morethan one @ ";
        t=0;
    }
    var part1=res[0];
    var part2=res[1];

    // part1
    if(part1.length==0)
    {
        document.getElementById("txtHint").innerHTML="no content bfr @";
            t=0;
        }
        if(part1.split(" ").length>2)
        {
            document.getElementById("txtHint").innerHTML="Invalid:Space before @";
             t=0;
        }

        //chk afr @ content:  part2
        var dotsplt=part2.split('.');  //alert("After @ :"+part2);
        if(part2.split(".").length<2)
        {
            document.getElementById("txtHint").innerHTML="dot missing";
        t=0;
        }
        if(dotsplt[0].length==0 )
        {
            document.getElementById("txtHint").innerHTML="no content b/w @ and dot";
        t=0;
        }
        if(dotsplt[1].length<2 ||dotsplt[1].length>4)
        {
            document.getElementById("txtHint").innerHTML="err aftr dot";
            t=0;
        }

        if(t==1)
        document.getElementById("txtHint").innerHTML= "is a valid email";

}
