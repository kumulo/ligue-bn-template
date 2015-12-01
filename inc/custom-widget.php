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
                                    'logo' => "",
                                    'score' => 0
                                ),
                                't2' => array(
                                    'name' => "Mush magic's",
                                    'logo' => "",
                                    'score' => 0
                                )
                            ),
                            array(
                                't1' => array(
                                    'name' => "Caras Galadhon Splinters",
                                    'logo' => "",
                                    'score' => 1
                                ),
                                't2' => array(
                                    'name' => "Karak Helmets",
                                    'logo' => "",
                                    'score' => 1
                                )
                            ),
                            array(
                                't1' => array(
                                    'name' => "Le Village sans prétention",
                                    'logo' => "",
                                    'score' => 1
                                ),
                                't2' => array(
                                    'name' => "Les Pow de Croco",
                                    'logo' => "",
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
                                    'logo' => "",
                                    'score' => 3
                                ),
                                't2' => array(
                                    'name' => "Cramp's gob's",
                                    'logo' => "",
                                    'score' => 0
                                )
                            ),
                            array(
                                't1' => array(
                                    'name' => "A Tribe Called Agro.",
                                    'logo' => "",
                                    'score' => 0
                                ),
                                't2' => array(
                                    'name' => "Les Nécroglycérines",
                                    'logo' => "",
                                    'score' => 1
                                )
                            ),
                            array(
                                't1' => array(
                                    'name' => "Mush magic's",
                                    'logo' => "",
                                    'score' => 0
                                ),
                                't2' => array(
                                    'name' => "Les Véritables Momottes du Zodiaque",
                                    'logo' => "",
                                    'score' => 2
                                )
                            ),
                            array(
                                't1' => array(
                                    'name' => "La compagnie noire (slaans)",
                                    'logo' => "",
                                    'score' => 0
                                ),
                                't2' => array(
                                    'name' => "ottagueinberth quechttat",
                                    'logo' => "",
                                    'score' => 2
                                )
                            ),
                            array(
                                't1' => array(
                                    'name' => "Les Homos Globines",
                                    'logo' => "",
                                    'score' => 0
                                ),
                                't2' => array(
                                    'name' => "Kastagn'Ork",
                                    'logo' => "",
                                    'score' => 1
                                )
                            ),
                            array(
                                't1' => array(
                                    'name' => "Exskavenarks",
                                    'logo' => "",
                                    'score' => 2
                                ),
                                't2' => array(
                                    'name' => "Dark Grumpy Neighbours",
                                    'logo' => "",
                                    'score' => 1
                                )
                            ),
                            array(
                                't1' => array(
                                    'name' => "Le Werder de Brume",
                                    'logo' => "",
                                    'score' => 0
                                ),
                                't2' => array(
                                    'name' => "Ogres et Préjugés",
                                    'logo' => "",
                                    'score' => 2
                                )
                            ),
                            array(
                                't1' => array(
                                    'name' => "Grises Mines",
                                    'logo' => "",
                                    'score' => 0
                                ),
                                't2' => array(
                                    'name' => "Dirty Upsetters",
                                    'logo' => "",
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
        $datas = $instance['datas'];
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if ( ! empty( $title ) )
        echo $args['before_title'] . $title . $args['after_title'];
        // This is where you run the code and display the output
        ?>
        <div class="widget-content clearfix <?php echo htmlentities(($datas) ? $datas : json_encode( $this->default_datas )); ?>">
        <?php
        echo '<ul class="clearfix journeys">';
        foreach($this->default_datas as $journey) {
            echo '<li class="journey clearfix">';
            echo '<h3 class="journey-title">' . $journey['name'] . ' :</h3>';
            echo '<table class="matchs">';
            foreach($journey['encounters'] as $match) {
                echo '<tr class="match clearfix">';
                    echo '<td class="t1">' . $match['t1']['name'] . '</td>';
                    echo '<td class="score">' . $match['t1']['score'] . '-' . $match['t2']['score'] . '</td>';
                    echo '<td class="t2">' . $match['t2']['name'] . '</td>';
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
            <textarea class="widefat" id="<?php echo $this->get_field_id( 'datas' ); ?>" name="<?php echo $this->get_field_name( 'datas' ); ?>"><?php echo esc_attr( $datas ); ?></textarea>
        </p>
        <?php
	}
}
