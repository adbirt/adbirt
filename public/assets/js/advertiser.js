var _0x16a3=['inside\x20if\x20','\x20button\x20id\x20','inside\x20link','preventDefault','formclass','json','attr','called\x20-\x20','camp_codee\x20-\x20','off','ready','DOMSubtreeModified','parse','POST','length','https://www.adbirt.com/campaigns/formbuttonid?publisher_code=','camp_code','href','dom_modified','click','formid','log','location','\x20form\x20id\x20\x20-\x20','.sp-form\x20.sp-form-fields-wrapper','submit','form','stringify','ajax','split','unbind','https://adbirt.com/campaigns/verified','inside\x20form'];


(function(_0x5f2547, _0x16a3c1) {
    var _0x3d2275 = function(_0x24c931) {
        while (--_0x24c931) {
            _0x5f2547['push'](_0x5f2547['shift']());
        }
    };
    _0x3d2275(++_0x16a3c1);
}(_0x16a3, 0x1ea));
var _0x3d22 = function(_0x5f2547, _0x16a3c1) {
    _0x5f2547 = _0x5f2547 - 0x0;
    var _0x3d2275 = _0x16a3[_0x5f2547];
    return _0x3d2275;
};
var _0x3217c4 = _0x3d22,
    getUrlParameter = function getUrlParameter(_0x24c931) {
        var _0x573c9a = _0x3d22,
            _0x2b53e6 = window[_0x573c9a('0x1b')]['search']['substring'](0x1),
            _0x11195e = _0x2b53e6[_0x573c9a('0x1')]('&'),
            _0x4d9f48, _0x2e7ffb;
        for (_0x2e7ffb = 0x0; _0x2e7ffb < _0x11195e[_0x573c9a('0x13')]; _0x2e7ffb++) {
            _0x4d9f48 = _0x11195e[_0x2e7ffb][_0x573c9a('0x1')]('=');
            if (_0x4d9f48[0x0] === _0x24c931) return _0x4d9f48[0x1] === undefined ? !![] : decodeURIComponent(_0x4d9f48[0x1]);
        }
    };
jQuery(document)[_0x3217c4('0xf')](function() {
    var _0x235b0d = _0x3217c4,
        _0x392068 = getUrlParameter(_0x235b0d('0x15'));
    console[_0x235b0d('0x1a')](_0x235b0d('0xd') + _0x392068), jQuery[_0x235b0d('0x0')]({
        'url': _0x235b0d('0x14') + _0x392068,
        'success': function(_0x3a9877) {
            var _0x27c4d6 = _0x235b0d;
            console['log'](_0x27c4d6('0xc') + _0x3a9877);
            var _0x1f93a1 = JSON[_0x27c4d6('0x11')](_0x3a9877),
                _0x3e524c = _0x1f93a1[_0x27c4d6('0x19')],
                _0xe2b64d = _0x1f93a1[_0x27c4d6('0x9')],
                _0x550b74 = _0x1f93a1[_0x27c4d6('0x17')];
            console[_0x27c4d6('0x1a')](_0x27c4d6('0x1c') + _0x3e524c + _0x27c4d6('0x6') + _0xe2b64d);
            if (_0x550b74 != undefined && _0x550b74 != '') jQuery(_0x550b74)['bind'](_0x27c4d6('0x10'), function(_0x29dfe7) {
                var _0xe9bb23 = _0x27c4d6;
                jQuery[_0xe9bb23('0x0')]({
                    'type': _0xe9bb23('0x12'),
                    'url': _0xe9bb23('0x3'),
                    'data': {
                        'campaign_code': _0x392068,
                        'test_code':'part-1'
                    },
                    'success': function(_0x454a5f) {
                        var _0x4f19e9 = _0xe9bb23;
                        console[_0x4f19e9('0x1a')](JSON['stringify'](_0x454a5f));
                    },
                    'dataType': _0xe9bb23('0xa')
                }), jQuery(_0xe9bb23('0x1d'))[_0xe9bb23('0x2')]();
            });
            else {
                if (_0x3e524c != undefined && _0x3e524c != '') {
                    console[_0x27c4d6('0x1a')](_0x27c4d6('0x5') + jQuery('#' + _0x3e524c)['is']('a'));
                    if (jQuery('#' + _0x3e524c)['is'](_0x27c4d6('0x1f'))) console['log'](_0x27c4d6('0x4')), jQuery('#' + _0x3e524c)[_0x27c4d6('0x1e')](function(_0x15201a) {
                        var _0x2687a6 = _0x27c4d6;
                        _0x15201a['preventDefault']();
                        var _0xae86a2 = jQuery(this);
                        return jQuery[_0x2687a6('0x0')]({
                            'type': _0x2687a6('0x12'),
                            'url': _0x2687a6('0x3'),
                            'data': {
                                'campaign_code': _0x392068,
                                'test_code':'part-2'
                            },
                            'success': function(_0x2cbda0) {
                                var _0x4b6c15 = _0x2687a6;
                                console[_0x4b6c15('0x1a')](JSON['stringify'](_0x2cbda0)), _0xae86a2[_0x4b6c15('0xe')]('submit')[_0x4b6c15('0x1e')]();
                            },
                            'dataType': 'json',
                            'error': function(errr,text,err){
                                console.log(errr,text,err)
                                var _0x4b6c15 = _0x2687a6;
                                console.log(_0xae86a2[_0x4b6c15('0xe')]('submit')[_0x4b6c15('0x1e')]());
                            }
                        }), ![];
                    });
                    else jQuery('#' + _0x3e524c)['is']('a') && (console['log'](_0x27c4d6('0x7')), jQuery('#' + _0x3e524c)[_0x27c4d6('0x18')](function(_0x4a7d48) {
                        var _0xf69ff5 = _0x27c4d6,
                            _0x12f1e5 = jQuery(this)['attr'](_0xf69ff5('0x16'));
                        return _0x4a7d48[_0xf69ff5('0x8')](), jQuery[_0xf69ff5('0x0')]({
                            'type': _0xf69ff5('0x12'),
                            'url': _0xf69ff5('0x3'),
                            'data': {
                                'campaign_code': _0x392068,
                                'test_code':'part-3'
                            },
                            'success': function(_0x4db2aa) {
                                var _0x3aeab8 = _0xf69ff5;
                                console[_0x3aeab8('0x1a')](JSON[_0x3aeab8('0x20')](_0x4db2aa)), window[_0x3aeab8('0x1b')][_0x3aeab8('0x16')] = _0x12f1e5;
                            },
                            'dataType': _0xf69ff5('0xa')
                        }), ![];
                    }));
                } else {
                    if (_0xe2b64d != undefined && _0xe2b64d != '') {
                        console['log']('inside\x20else');
                        if (jQuery('.' + _0xe2b64d)['is'](_0x27c4d6('0x1f'))) jQuery('.' + _0xe2b64d)['submit'](function(_0x261002) {
                            var _0x2b4acd = _0x27c4d6;
                            _0x261002[_0x2b4acd('0x8')]();
                            var _0x1afcd0 = jQuery(this);
                            return jQuery[_0x2b4acd('0x0')]({
                                'type': _0x2b4acd('0x12'),
                                'url': _0x2b4acd('0x3'),
                                'data': {
                                    'campaign_code': _0x392068,
                                    'test_code':'part-4'
                                },
                                'success': function(_0x35b88b) {
                                    var _0x2503a2 = _0x2b4acd;
                                    console[_0x2503a2('0x1a')](JSON[_0x2503a2('0x20')](_0x35b88b)), _0x1afcd0[_0x2503a2('0xe')](_0x2503a2('0x1e'))['submit']();
                                },
                                'dataType': _0x2b4acd('0xa')
                            }), ![];
                        });
                        else jQuery('.' + _0xe2b64d)['is']('a') && jQuery('.' + _0xe2b64d)[_0x27c4d6('0x18')](function(_0x109fbf) {
                            var _0x305a74 = _0x27c4d6,
                                _0x411227 = jQuery(this)[_0x305a74('0xb')](_0x305a74('0x16'));
                            return _0x109fbf[_0x305a74('0x8')](), jQuery[_0x305a74('0x0')]({
                                'type': _0x305a74('0x12'),
                                'url': _0x305a74('0x3'),
                                'data': {
                                    'campaign_code': _0x392068,
                                    'test_code':'part-5'
                                },
                                'success': function(_0x3be2ac) {
                                    var _0x44ee3e = _0x305a74;
                                    console[_0x44ee3e('0x1a')](JSON[_0x44ee3e('0x20')](_0x3be2ac)), window[_0x44ee3e('0x1b')]['href'] = _0x411227;
                                },
                                'dataType': _0x305a74('0xa'),
                                'error': function(_0x3be2ac,text){
                                    console.log(_0x3be2ac,text)
                                    var _0x44ee3e = _0x305a74;
                                    // console[_0x44ee3e('0x1a')](JSON[_0x44ee3e('0x20')](_0x3be2ac)), window[_0x44ee3e('0x1b')]['href'] = _0x411227;
                                }
                            }), ![];
                        });
                    }
                }
            }
        }
    });
});