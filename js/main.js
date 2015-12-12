
var randomQuote = new Array();


randomQuote[0] = "&quotStrive not to be a success, but rather to be of value&quot<span class='author'>-Albert Einstein</span>";
randomQuote[1] = "&quotWe make a living by what we get, but we make a life by what we give&quot<span class='author'>-Winston Churchill</span>";
randomQuote[2] = "&quotSuccess is getting what you want, happiness is wanting what you get&quot<span class='author'>― W.P. Kinsella</span>";
randomQuote[3] = "&quotIf you can dream it, you can do it&quot<span class='author'>― Walt Disney</span>" ;
randomQuote[4]	= "&quotAt the end of the day, let there be no excuses, no explanations, no regrets&quot<span class='author'>―Steve Maraboli</span>" ;

var randomNumber = Math.floor(Math.random() * randomQuote.length);	

function somerandom(){

	randomNumber = Math.floor(Math.random() * randomQuote.length);
 	
	document.getElementById("quote").innerHTML=randomQuote[randomNumber];
		
	
} 


setInterval("somerandom()", 3000);




 






