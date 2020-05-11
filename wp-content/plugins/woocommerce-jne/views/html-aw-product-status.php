<?php
/**
 * Admin View: Section - AgenWebsite Product Status
 */

if ( ! defined( 'WOOCOMMERCE_JNE' ) ) {
	exit;
}

if( $status == 'success' ){
    $icon = 'good.png';
    $teks = $message;
} else {
    $icon = 'bad.png';
    $teks = $message;
}
if( $teks == 'Lisensi Anda sudah terpakai pada domain lain.' ) {
	$teks .= '<input name="reactive" class="button-primary woocommerce-save-button" type="submit" value="Aktifkan Ulang">';
}
?>
        <tr>
            <td colspan="3" class="load_status"><center><img src="<?php echo WC_JNE()->plugin_url();?>/assets/images/<?php echo $icon;?>" /> <span><b><?php echo $teks;?></b></span></center></td>
        </tr>
<?php
if( $status == 'success' ){
        foreach( $data as $title => $value ){

            // replace dash to space
            $value = ( $title == 'basis_kota' ) ? str_replace('-', ' ', $value) : $value;

            // replace underscore to space
            $title = str_replace('_', ' ', $title);

            // not print value array
            $no_print = array( 'code', 'message' );
            
            // convert format
            if( $title == 'expire date' )
                $value = WC_JNE()->convert_date( $value, 'd M Y' );
            
            // loop value from api
            if( ! in_array($title, $no_print) ){
                $class = 'yes';
                if($title == 'response time') {
                    if($value > intval(1000)) {
                        $class = 'no';
                    }

                    $value = $value . 'ms';
                }
                echo '<tr>';
                    echo '<td>' . ucfirst($title) . '</td>';
                    echo '<td><mark class="'.$class.'">' . $value . '</mark></td>';
                    echo '<td></td>';
                echo '</tr>';
            }
        }
?>
<?php }?>