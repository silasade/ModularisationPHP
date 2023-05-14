<?php
    //$commonWordsCount contains the the words that appears more than twice and the number of times it appears
    $commonWordsCount=[];
    //$commonWords contains the the words that appears more than twice
    $commonWords=[];
    //$file is the varable that reads the contents of PhPFrameWork.txt
    $file=file("PhPFrameWork.txt");
    //contents is the array that stores each word in the txt file
    $contents=array();
    //replacewords contains the words i want to replace in the commonwords array
    $replaceWords = [];
    //updatedworda contains the words contains the contents of the contents array but the common wors have been replaced with "" 
    $updatedWords=[];
    //echo $contents;
    //taking each words of each line of the txt file and storing it in the contents file
    foreach($file as $lines){
        $words=explode(' ',$lines);
        foreach ($words as $word){
            array_push($contents, $word);
        }
    }
    //counts is an array that has the total number of each words of the contents array
    $counts = array_count_values($contents);
    //I am going to assume any word that appears more than 2 times is a common word 
    foreach ($counts as $key => $value){
        if($value>=3 ){
            array_push($commonWordsCount," ('$key') appears ($value) times"); 
            //putting the words that appears 3 or more time and putting it in the commonWords array
            for($i=0; $i<$value; $i++){
                array_push($commonWords, $key);
            }
            //replacing the common words with a " " 
            if($key !== 'a')
            {
                $replaceWords=array($key=> " ");
                $updatedWords = array_map(function ($contents) use ($replaceWords) {
                return strtr($contents, $replaceWords);
              }, $contents);
            }
        }
    }
    //joining the words baack together to form a string
    $result = implode(" ", $commonWords);
    $result1=implode(" ", $updatedWords);
    // Write the result to a text file
    $fileContent = $result ."\n" . $result1;
    $file2 = 'output.txt';
    file_put_contents($file2,$fileContent);
    //printing out the number of times a common word appear
    for($i=0; $i<count($commonWordsCount); $i++){
        echo $commonWordsCount[$i]. "\n";
    }
    
?>
