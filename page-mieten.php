<?php get_header();
    /*
    * Template Name: Mieten
    */
    $this_post = get_post();
    $content = $this_post->post_content;
    $convertedContent = get_RentObject($content);
    
    $resultsArray = [];
    $tempArray = [];
    $iterator = 0;
    $iterator2 = 0;
    $h3Counter = 0;
    foreach ($convertedContent as $element) {
        if ($element[0] === "h3" || $element[0] === "h2"){
            if($tempArray !== null){
                $resultsArray[$iterator++] = $tempArray;
                $tempArray = null;
                $iterator2 = 0;
            }
            $tempArray[$iterator2++] = $element;
        }

        if ($element[0] === "li") {
            $tempArray[$iterator2++] = $element;
        }
    }
?>

    <div class="products-wrapper">
        <div class="container-fluid products-content rent">
            <div class="row">
                <div class="card">
                    <div class="responsive-dataview">
                        <ul>
                            
                            <?php 
                            foreach($resultsArray as $results) : 
                                ?>
                                <?php if(sizeof($results) > 0) :?>
                                    <li>
                                        <?php 
                                            $iterator = 0;
                                        foreach($results as $entry) : 
                                        
                                            if($entry[0] === "h3") {
                                                $iterator = 0;
                                            } else {
                                                ++$iterator;
                                            }
                                        
                                        ?>
                                           <?php if($entry[0] === "h2") :?>
                                               <?php echo $entry[1] ?>
                                           <?php endif; ?>
                                           <?php if($entry[0] === "h3") :?>
                                               <?php echo $entry[1] ?>
                                           <?php endif; ?>
                                           <?php if($entry[0] === "li") :?>
                                           <p>    
                                                <?php if($iterator === 1) :?>
                                                    Stundenmiete:
                                                <?php endif; ?>
                                                <?php if($iterator === 2) :?>
                                                    Tagesmiete:
                                                <?php endif; ?>
                                                <?php echo $entry[1] ?>
                                            
                                            </p>
                                           <?php endif; ?>
                                        <?php endforeach; ?>
                                    </li>
                                <?php endif; ?> 
                            <?php endforeach; ?>
                        </ul>
                        <div class="table">
                            <table>
                                <th><h2>Gerätetyp</h2></th>
                                <th><h2>Stundenmiete</h2></th>
                                <th><h2>Tagesmiete</h2></th>
                            <?php foreach($resultsArray as $results) : ?>
                                <?php if(sizeof($results) > 0) :?>
                                <tr>
                                        <?php foreach($results as $entry) : ?>
                                            <?php if($entry[0] === "h2") :?>
                                                    <?php echo $entry[1] ?>
                                            <?php endif; ?>
                                            <?php if($entry[0] === "h3") :?>
                                            <td>
                                                <?php echo $entry[1] ?>
                                            </td>
                                            <?php endif; ?>

                                            <?php if($entry[0] === "li") : ?>
                                            <td>
                                                <p><?php echo $entry[1] ?></p>
                                            </td>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        </tr>
                                <?php endif; ?> 
                            <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>