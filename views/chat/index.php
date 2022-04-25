<?php
    $user                   = $this->d['user'];
?>

<!DOCTYPE html>
<html lang="en">
<body>
    <?php require 'header.php'; ?>
    <div class="wrapper">
        <div class="container">
            <h2 class="center">Chat</h2>
        </div>
        <div class="container chat-container">
            <div class="chat-messages-list">
                <div class="chat-message-item-own">
                    Hola
                </div>
                <div class="chat-message-item">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sem nunc, finibus ac auctor a, pulvinar id sapien. Cras nisl quam, dignissim nec orci ut, rhoncus ornare tortor. Sed at felis at felis interdum rhoncus vel lobortis turpis. Sed non consequat tortor. Nunc sed diam libero. Fusce id mauris sit amet neque convallis aliquet. Mauris vel lacus felis.

Morbi interdum purus urna. Nam ut lacinia purus. Donec et orci consectetur ligula convallis efficitur at ac urna. Donec lobortis purus ut lorem posuere, nec commodo purus cursus. Integer hendrerit lectus orci, eu accumsan eros ultricies vitae. Duis euismod urna in diam aliquam auctor. Vivamus iaculis purus libero, sit amet congue ante auctor vel. Aenean in egestas turpis, ut viverra tellus. Nullam quis odio sagittis, posuere est eget, pellentesque ex. Morbi at ex at nisi blandit blandit at id dui. Nullam bibendum nulla in nunc laoreet mollis. Pellentesque id metus at lectus gravida tincidunt. Donec maximus tempor elit vel fermentum. Ut euismod et odio vitae placerat. Phasellus purus odio, aliquet id consectetur ac, accumsan id nisl. Aenean id dolor ligula.

Curabitur mattis quam sit amet ligula ultrices egestas. In odio risus, bibendum et bibendum in, pellentesque eu leo. In feugiat arcu ex, at mollis massa viverra eleifend. Etiam consectetur, est in tempor facilisis, metus neque blandit nulla, a faucibus massa metus non elit. Donec fermentum tristique lobortis. Nulla lectus augue, commodo mattis libero at, dignissim tempor ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus in tristique est, sit amet fringilla neque. Mauris aliquet pretium nisl ac hendrerit. Aenean at lectus et quam aliquet bibendum ut dictum urna. Donec mollis iaculis tincidunt. Aliquam fringilla bibendum feugiat. Duis quis ex a tellus rhoncus egestas.

Sed mollis congue dui, eget porta risus consequat id. Fusce finibus accumsan metus non aliquet. Vivamus pharetra, risus id rutrum porta, tellus ligula lobortis leo, a lobortis felis metus non ex. Nulla facilisi. Suspendisse lobortis suscipit ante, nec posuere diam tincidunt placerat. Mauris bibendum nisl non accumsan pharetra. Nam eu fringilla metus. Phasellus in est sit amet dolor efficitur blandit. Nam pulvinar ultrices est aliquet rutrum. Sed sit amet placerat nulla. Duis eleifend mi nec molestie ultricies. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.

Nam diam velit, pulvinar sit amet tincidunt vel, vehicula et nibh. Maecenas sodales nibh ac erat tristique, accumsan vulputate nisl fermentum. Duis a ipsum id arcu dignissim suscipit. In mauris velit, lobortis eu eleifend non, commodo eget neque. Vivamus et diam vel lacus mollis dictum in eget felis. Phasellus vel nunc efficitur, pulvinar magna sit amet, mattis mauris. Morbi vel tempus erat. Etiam a odio sem. Quisque tempor ornare lorem elementum condimentum. Nullam at hendrerit ante. Vestibulum mi turpis, sagittis eget diam at, luctus gravida purus. Fusce convallis fringilla tempor. Maecenas accumsan viverra venenatis. Nulla semper sed risus sit amet facilisis.
                </div>
            </div>
            <form class="chat-form">
                <textarea name="message" id="" cols="30" rows="10" class="chat-textbox" resize="false"></textarea>
                <input type="submit" name="send" class="form-btn-success chat-submit" value="Send" pointer></input>
            </form>
        </div>
    </div>
</body>
<style>
    .wrapper{
        padding-top:60px;
    }
</style>
</html>