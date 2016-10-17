 <?php 
 echo $this->Form->input("title",["label"=>"Título"]);
 echo $this->Form->input("description",["label"=>"Descripción"]);
 echo $this->Form->input("complexity",["options" => ["low" => "Baja","medium" => "Media", "high" => "Alta"],"label" => "Complejidad"]);
 
 ?>