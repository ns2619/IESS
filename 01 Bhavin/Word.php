<?php 
$word = new COM("word.application") or die ("couldnt create an instance of word"); 
echo "loaded , word version{$word->version}"; 
//bring word to the front 
$word->visible = 1; 
//open a word document 
$word->Documents->Add(); 
//add some text to the document 
$word->Selection->TypeText("this is some sample text in the document"); 
//save the document as sampleword.doc 
$word->Documents[1]->SaveAs("sampleword.doc"); 
//close word 
$word->Quit(); 
//free object resources 
$word->Release(); 
$word = null; 
?> 
