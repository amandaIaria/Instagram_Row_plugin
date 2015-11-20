<?php
add_action( 'admin_init', 'i_settings_init' );
add_action( 'admin_menu', 'i_add_admin_menu' );

function i_add_admin_menu(  ) { 

	add_options_page( 'Instagram', 'Instagram', 'manage_options', 'instagram', 'i_options_page' );

}


function i_settings_init(  ) { 

	register_setting( 'ipluginPage', 'i_settings' );

	add_settings_section(
		'i_pluginPage_section', 
		__( '', 'wordpress' ), 
		'i_settings_section_callback', 
		'ipluginPage'
	);

	add_settings_field( 
		'iapikey', 
		__( 'Client Key (API Key)', 'wordpress' ), 
		'iapikey_render', 
		'ipluginPage', 
		'i_pluginPage_section' 
	);

	add_settings_field( 
		'itsecapi', 
		__( 'Client Secret (API Secret)', 'wordpress' ), 
		'isecapi_render', 
		'ipluginPage', 
		'i_pluginPage_section' 
	);

	add_settings_field( 
		'iat', 
		__( 'Access Token', 'wordpress' ), 
		'iat_render', 
		'ipluginPage', 
		'i_pluginPage_section' 
	);

	add_settings_field( 
		'iusname', 
		__( 'Username', 'wordpress' ), 
		'iusname_render', 
		'ipluginPage', 
		'i_pluginPage_section' 
	);

	add_settings_field( 
		'iuserID', 
		__( 'userID', 'wordpress' ), 
		'iuserID_render', 
		'ipluginPage', 
		'i_pluginPage_section' 
	);

	

	add_settings_field( 
		'icss_styles', 
		__( 'Custom CSS', 'wordpress' ), 
		'istyles_render', 
		'ipluginPage', 
		'i_pluginPage_section' 
	);
	


}
function iat_render(  ) { 

	$options = get_option( 'i_settings' );
	?>
	<input required type='text' name='i_settings[iat]' value='<?php echo $options['iat']; ?>'>
	<?php

}

function iuserID_render(  ) { 

	$options = get_option( 'i_settings' );
	?>
	<input required type='text' name='i_settings[iuserID]' value='<?php echo $options['iuserID']; ?>'>
	<?php

}

function iapikey_render(  ) { 

	$options = get_option( 'i_settings' );
	?>
	<input required type='text' name='i_settings[iapikey]' value='<?php echo $options['iapikey']; ?>'>
	<?php

}

function istyles_render(  ) { 

	$options = get_option( 'i_settings' );
	?>
	<textarea rows="10" cols="50" name='i_settings[icss_styles]'><?php echo $options['icss_styles']; ?></textarea>
	<?php

}




function isecapi_render(  ) { 

	$options = get_option( 'i_settings' );
	?>
	<input required type='text' name='i_settings[isecapi]' value='<?php echo $options['isecapi']; ?>'>
	<?php

}




function iusname_render(  ) { 

	$options = get_option( 'i_settings' );
	?>
	<input required type='text' name='i_settings[iusname]' value='<?php echo $options['iusname']; ?>'>
	<?php

}




function i_settings_section_callback(  ) { 

	echo __( '<h2>Information</h2>
		<ul>
			<li>
				<a href="https://instagram.com/developer/" target="_blank">https://instagram.com/developer/</a>
			</li>
			<li>
			<a href="http://instagram.pixelunion.net/" target="_blank">http://instagram.pixelunion.net/</a>
			</li>
			<li>
				<a href="http://jelled.com/instagram/lookup-user-id" target="_blank">http://jelled.com/instagram/lookup-user-id</a>
			</li>
			
		</ul>
		<h2>Settings</h2>		

			', 'wordpress' );

}


function i_options_page(  ) { 

	?>
	<form action='options.php' method='post'>
		
	<h1>Instagram</h1>

		
		<?php
		settings_fields( 'ipluginPage' );
		do_settings_sections( 'ipluginPage' );
		submit_button();
		?>
		
	</form>
	<?php

}

?>