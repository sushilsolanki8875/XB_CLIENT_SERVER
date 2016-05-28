( function ( $ ) {
	'use strict';

	var eoHF = {
		id: 'eo-h-f',
		name: 'Espernto h-f',
		description: 'writing Esperanto-letters using Zamenhof\'s fundamental system.',
		date: '2013-02-12',
		URL: 'http://github.com/wikimedia/jquery.ime',
		author: 'Parag Nemade',
		license: 'GPLv3',
		version: '1.0',
		patterns: [
			['ĉh', 'ch'],
			['ĝh', 'gh'],
			['ĥh', 'hh'],
			['ĵh', 'jh'],
			['ŝh', 'sh'],
			['aŭu', 'au'],
			['eŭu', 'eu'],
			['Ĉh', 'Ch'],
			['Ĝh', 'Gh'],
			['Ĥh', 'Hh'],
			['Ĵh', 'Jh'],
			['Ŝh', 'Sh'],
			['Aŭu', 'Au'],
			['Eŭu', 'Eu'],
			['ĈH', 'CH'],
			['ĜH', 'GH'],
			['ĤH', 'HH'],
			['ĴH', 'JH'],
			['ŜH', 'SH'],
			['AŬU', 'AU'],
			['EŬU', 'EU'],
			['ch', 'ĉ'],
			['gh', 'ĝ'],
			['hh', 'ĥ'],
			['jh', 'ĵ'],
			['sh', 'ŝ'],
			['au', 'aŭ'],
			['eu', 'eŭ'],
			['Ch', 'Ĉ'],
			['Gh', 'Ĝ'],
			['Hh', 'Ĥ'],
			['Jh', 'Ĵ'],
			['Sh', 'Ŝ'],
			['Au', 'Aŭ'],
			['Eu', 'Eŭ'],
			['CH', 'Ĉ'],
			['GH', 'Ĝ'],
			['HH', 'Ĥ'],
			['JH', 'Ĵ'],
			['SH', 'Ŝ'],
			['AU', 'AŬ'],
			['EU', 'EŬ']]
	};

	$.ime.register( eoHF );
}( jQuery ) );
