<?php

use yii\db\Migration;

/**
 * Class m220624_072610_tbl_sip_profile_parameters
 */
class m220624_072610_tbl_sip_profile_parameters extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tblSipProfileParameters', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'value' => $this->string()->notNull(),
            'desc' => $this->string(1024)->notNull()->defaultValue(''),
        ]);

        $internal = [
            ['accept-blind-auth', 'true', false],
            ['accept-blind-reg', 'true', false],
            ['aggressive-nat-detection', 'true', true],
            ['alias', 'sip:10.0.1.251:5555', false],
            ['apply-inbound-acl', 'domains', true],
            ['apply-nat-acl', 'nat.auto', true],
            ['apply-register-acl', 'domains', false],
            ['auth-all-packets', 'false', true],
            ['auth-calls', '$${internal_auth_calls}', true],
            ['auto-jitterbuffer-msec', '60', false],
            ['auto-rtp-bugs', ' ', false],
            ['bind-params', 'transport=udp', false],
            ['bitpacking', 'aal2', false],
            ['caller-id-type', 'rpid', false],
            ['caller-id-type', 'pid', false],
            ['caller-id-type', 'none', false],
            ['challenge-realm', 'auto_to', true],
            ['cid-in-1xx', 'false', false],
            ['context', 'public', true],
            ['dbname', 'share_presence', false],
            ['debug', '0', true],
            ['delete-subs-on-register', 'false', false],
            ['dialplan', 'XML', true],
            ['disable-naptr', 'false', false],
            ['disable-register', 'true', false],
            ['disable-rtp-auto-adjust', 'true', false],
            ['disable-srv', 'false', false],
            ['disable-srv503', 'true', false],
            ['disable-transcoding', 'true', false],
            ['disable-transfer', 'true', false],
            ['dtmf-duration', '2000', true],
            ['dtmf-type', 'rfc2833', true],
            ['enable-100rel', 'true', false],
            ['enable-3pcc', 'true', false],
            ['enable-compact-headers', 'true', false],
            ['enable-timer', 'false', false],
            ['extended-info-parsing', 'true', false],
            ['ext-rtp-ip', '$${external_rtp_ip}', true],
            ['ext-sip-ip', '$${external_rtp_ip}', true],
            ['force-register-db-domain', '$${domain}', false],
            ['force-register-domain', '$${domain}', false],
            ['force-subscription-domain', '$${domain}', false],
            ['force-subscription-expires', '60', false],
            ['forward-unsolicited-mwi-notify false', true],
            ['hold-music', '$${hold_music}', true],
            ['inbound-bypass-media', 'true', false],
            ['inbound-codec-negotiation', 'generous', true],
            ['inbound-codec-prefs', '$${global_codec_prefs}', true],
            ['inbound-late-negotiation', 'true', false],
            ['inbound-proxy-media', 'true', false],
            ['inbound-reg-force-matching-username true', true],
            ['liberal-dtmf', 'true', false],
            ['local-network-acl', 'localnet.auto', true],
            ['log-auth-failures', 'true', true],
            ['manage-presence', 'true', true],
            ['manage-shared-appearance', 'true', true],
            ['manual-redirect', 'true', false],
            ['max-proceeding', '1000', false],
            ['media-option', 'bypass-media-after-att-xfer', false],
            ['media-option', 'resume-media-on-hold', false],
            ['minimum-session-expires', '120', false],
            ['multiple-registrations', 'contact', false, 'Enables registrations on multiple endpoints'],
            ['nat-options-ping', 'true', false],
            ['NDLB-broken-auth-hash', 'true', false],
            ['NDLB-force-rport', 'safe', 'true', 'Enables rport'],
            ['NDLB-received-in-nat-reg-contact true', false],
            ['nonce-ttl', '60', true],
            ['odbc-dsn', '$${dsn}', false],
            ['outbound-codec-prefs', '$${global_codec_prefs}', true],
            ['pass-callee-id', 'false', false],
            ['pass-rfc2833', 'true', false],
            ['presence-hosts', 'domain,{local_ip_v4}', false],
            ['presence-privacy', '$${presence_privacy}', true],
            ['presence-probe-on-register', 'true', true],
            ['presence-proto-lookup', 'true', false],
            ['record-path', '$${recordings_dir}', true],
            ['record-template', '${domain_name}/archive/${strftime(%Y)}/${strftime(%b)}/${strftime(%d)}/${uuid}.${record_ext}', true],
            ['registration-thread-frequency 30', false],
            ['renegotiate-codec-on-hold', 'true', false],
            ['rfc2833-pt', '101', true],
            ['rtcp-audio-interval-msec', '5000', false],
            ['rtcp-video-interval-msec', '5000', false],
            ['rtp-autofix-timing', 'false', false],
            ['rtp-autoflush-during-bridge false', false],
            ['rtp-hold-timeout-sec', '1800', true],
            ['rtp-ip', '$${local_ip_v4}', true],
            ['rtp-rewrite-timestamps', 'true', false],
            ['rtp-timeout-sec', '300', true],
            ['rtp-timer-name', 'soft', true],
            ['send-message-query-on-register true', false],
            ['send-presence-on-register', 'true', false],
            ['session-timeout', '1800', false],
            ['shutdown-on-fail', 'true', false],
            ['sip-capture', 'no', true],
            ['sip-ip', '$${local_ip_v4}', true],
            ['sip-port', '$${internal_sip_port}', true],
            ['sip-trace', 'no', true],
            ['suppress-cng', 'true', false],
            ['timer-T1', '500', false],
            ['timer-T1X64', '32000', false],
            ['timer-T2', '4000', false],
            ['timer-T4', '4000', false],
            ['tls', '$${internal_ssl_enable}', true],
            ['tls-bind-params', 'transport=tls', true],
            ['tls-cert-dir', '$${internal_ssl_dir}', true],
            ['tls-only', 'false', true],
            ['tls-passphrase', ' ', true],
            ['tls-sip-port', '$${internal_tls_port}', true],
            ['tls-verify-date', 'true', true],
            ['tls-verify-depth', '2', true],
            ['tls-verify-in-subjects', ' ', true],
            ['tls-verify-policy', 'all|subjects_all', false],
            ['tls-version', '$${sip_tls_version}', true],
            ['unregister-on-options-fail', 'true', false],
            ['user-agent-string', 'p-line', true],
            ['username', 'p-line', true, "DSP username"],
            ['vad', 'out', false],
            ['watchdog-enabled', 'no', true],
            ['watchdog-event-timeout', '30000', true],
            ['watchdog-step-timeout', '3000', true],
            ['ws-binding', ':5066', true],
            ['wss-binding', ':7443', true],
        ];


        foreach ($internal as $value) {

            $this->insert('tblSipProfileParameters', [
                'name' => $value[0],
                'value' => $value[1],
                'desc' => isset($value[3]) ? $value[3] : "",
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tblSipProfileParameters');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo 'm220608_110417_tbl_sip_profile_parameters cannot be reverted.\n';

        return false;
    }
    */
}
