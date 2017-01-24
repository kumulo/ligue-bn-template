<?php

class ClassementWidget extends WP_Widget {
    private $default_datas =
                array(
                    'journey1' => array(
                        'name' => 'Journée 5',
                        'encounters' => array(
                            array(
                                't1' => array(
                                    'name' => "Les Têtes Noires",
                                    'logo' => "http://gestion.ligue-bn.com/logos/picto_Les-Tetes-Noires.jpg",
                                    'score' => 0
                                ),
                                't2' => array(
                                    'name' => "Mush magic's",
                                    'logo' => "http://gestion.ligue-bn.com/logos/picto_Mush-magic--s.png",
                                    'score' => 0
                                )
                            ),
                            array(
                                't1' => array(
                                    'name' => "Caras Galadhon Splinters",
                                    'logo' => "http://gestion.ligue-bn.com/logos/picto_Caras-Galadhon-Splinters.png",
                                    'score' => 1
                                ),
                                't2' => array(
                                    'name' => "Karak Helmets",
                                    'logo' => "http://gestion.ligue-bn.com/logos/picto_Karak-Helmets.png",
                                    'score' => 1
                                )
                            ),
                            array(
                                't1' => array(
                                    'name' => "Le Village sans prétention",
                                    'logo' => "http://gestion.ligue-bn.com/logos/picto_Le-Village-sans-pretention.png",
                                    'score' => 1
                                ),
                                't2' => array(
                                    'name' => "Les Pow de Croco",
                                    'logo' => "http://gestion.ligue-bn.com/logos/picto_Les-Pow-de-Croco.png",
                                    'score' => 1
                                )
                            ),
                        ),
                    ),
                    'journey2' => array(
                        'name' => 'Journée 4',
                        'encounters' => array(
                            array(
                                't1' => array(
                                    'name' => "Nainduc du Baron",
                                    'logo' => "http://gestion.ligue-bn.com/logos/picto_Les-nainducs-du-Baron.png",
                                    'score' => 3
                                ),
                                't2' => array(
                                    'name' => "Cramp's gob's",
                                    'logo' => "http://gestion.ligue-bn.com/logos/picto_Cramp--s-gob--s.jpg",
                                    'score' => 0
                                )
                            ),
                            array(
                                't1' => array(
                                    'name' => "A Tribe Called Agro.",
                                    'logo' => "http://gestion.ligue-bn.com/logos/picto_A-Tribe-Called-Agro..png",
                                    'score' => 0
                                ),
                                't2' => array(
                                    'name' => "Les Nécroglycérines",
                                    'logo' => "http://gestion.ligue-bn.com/logos/picto_Les-Necroglycerines.png",
                                    'score' => 1
                                )
                            ),
                            array(
                                't1' => array(
                                    'name' => "Mush magic's",
                                    'logo' => "http://gestion.ligue-bn.com/logos/picto_Mush-magic--s.png",
                                    'score' => 0
                                ),
                                't2' => array(
                                    'name' => "Les Véritables Momottes du Zodiaque",
                                    'logo' => "http://gestion.ligue-bn.com/logos/picto_Les-Veritables-Momottes-du-Zodiaque.png",
                                    'score' => 2
                                )
                            ),
                            array(
                                't1' => array(
                                    'name' => "La compagnie noire (slaans)",
                                    'logo' => "http://gestion.ligue-bn.com/logos/picto_La-compagnie-noire-(slaans).png",
                                    'score' => 0
                                ),
                                't2' => array(
                                    'name' => "ottagueinberth quechttat",
                                    'logo' => "http://gestion.ligue-bn.com/logos/picto_ottagueinberthquechttat.jpg",
                                    'score' => 2
                                )
                            ),
                            array(
                                't1' => array(
                                    'name' => "Les Homos Globines",
                                    'logo' => "http://gestion.ligue-bn.com/logos/picto_Les-Homos-Globines.png",
                                    'score' => 0
                                ),
                                't2' => array(
                                    'name' => "Kastagn'Ork",
                                    'logo' => "http://gestion.ligue-bn.com/logos/picto_Kastagn--Ork.png",
                                    'score' => 1
                                )
                            ),
                            array(
                                't1' => array(
                                    'name' => "Exskavenarks",
                                    'logo' => "http://gestion.ligue-bn.com/logos/picto_Exskavenarks.png",
                                    'score' => 2
                                ),
                                't2' => array(
                                    'name' => "Dark Grumpy Neighbours",
                                    'logo' => "http://gestion.ligue-bn.com/logos/picto_Dark-Grumpy-Neighbours.png",
                                    'score' => 1
                                )
                            ),
                            array(
                                't1' => array(
                                    'name' => "Le Werder de Brume",
                                    'logo' => "http://gestion.ligue-bn.com/logos/picto_Le-Werder-de-Brume.png",
                                    'score' => 0
                                ),
                                't2' => array(
                                    'name' => "Ogres et Préjugés",
                                    'logo' => "http://gestion.ligue-bn.com/logos/picto_Ogres-et-Prejuges.png",
                                    'score' => 2
                                )
                            ),
                            array(
                                't1' => array(
                                    'name' => "Grises Mines",
                                    'logo' => "http://gestion.ligue-bn.com/logos/picto_Grises-Mines.jpg",
                                    'score' => 0
                                ),
                                't2' => array(
                                    'name' => "Dirty Upsetters",
                                    'logo' => "http://gestion.ligue-bn.com/logos/picto_Dirty-Upsetters.png",
                                    'score' => 3
                                )
                            ),
                        ),
                    ),
                );
	function __construct() {
		// Instantiate the parent object
		parent::__construct( false, 'Classement Ligue' );
	}

	function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $brutdatas = file_get_contents($instance['datas']);
        $datas = json_decode($brutdatas);
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if ( ! empty( $title ) )
        echo $args['before_title'] . $title . $args['after_title'];
        // This is where you run the code and display the output
        ?>
        <div class="widget-content clearfix <?php echo htmlentities(($datas) ? $datas : json_encode( $this->default_datas )); ?>">
        <?php
        echo '<ul class="clearfix journeys">';
        foreach($datas as $key => $journey) {
            echo '<li class="journey clearfix">';
            echo '<h3 class="journey-title">' . $datas->$key->name . ' :</h3>';
            echo '<table class="matchs">';
            foreach($datas->$key->encounters as $match) {
                echo '<tr class="match clearfix">';
                    $logo1 = ($match->t1->logo) ? '<span class="team-img" style="background-image: url(' . $match->t1->logo . ');"></span>' : '';
                    $logo2 = ($match->t2->logo) ? '<span class="team-img" style="background-image: url(' . $match->t2->logo . ');"></span>' : '';
                    echo '<td class="t1">' . $logo1 . '<span class="team-name">' . $match->t1->name . '</span></td>';
                    echo '<td class="score">' . $match->t1->score . '-' . $match->t2->score . '</td>';
                    echo '<td class="t2"><span class="team-name">' . $match->t2->name . '</span>' . $logo2 . '</td>';
                echo '</tr>';
            }
            echo '</table>';
            echo '</li>';
        }
        echo '</ul>';
        ?>
        </div>
        <?php
        echo $args['after_widget'];
	}

	function update( $new_instance, $old_instance ) {
		$instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['datas'] = ( ! empty( $new_instance['datas'] ) ) ? strip_tags( $new_instance['datas'] ) : '';
        return $instance;
	}

	function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'League results', 'liguebn' );
        }
		if ( isset( $instance[ 'datas' ] ) ) {
            $datas = $instance[ 'datas' ];
        }
        else {
            $datas = json_encode($this->default_datas);
        }
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'datas' ); ?>"><?php _e( 'Datas:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'datas' ); ?>" name="<?php echo $this->get_field_name( 'datas' ); ?>" type="text" value="<?php echo esc_attr( $datas ); ?>" />
        </p>
        <?php
	}
}
