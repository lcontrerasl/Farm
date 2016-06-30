<style>
    #carrito {
        padding-left: 250px;
        transition: all 0.4s ease 0s;
    }

    #sidebar-carrito {
        margin-left: -250px;
        left: 250px;
        width: 250px;
        background: #CCC;
        position: fixed;
        height: 100%;
        overflow-y: auto;
        z-index: 1000;
        transition: all 0.4s ease 0s;
    }

    #page-content-carrito {
        width: 100%;
    }

    .sidebar-nav {
        position: absolute;
        top: 0;
        width: 250px;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    @media (max-width:767px) {

        #carrito {
            padding-left: 0;
        }

        #sidebar-carrito {
            left: 0;
        }

        #carrito.active {
            position: relative;
            left: 250px;
        }

        #carrito.active #sidebar-carrito {
            left: 250px;
            width: 250px;
            transition: all 0.4s ease 0s;
        }

    }
</style>
<div id="carrito">
    <div id="sidebar-carrito">
        <ul class="sidebar-nav">
            <li class="sidebar-brand"><a href="#">hola mundo</a></li>
            <li><a href="#">Another link</a></li>
            <li><a href="#">Next link</a></li>
            <li><a href="#">Last link</a></li>
        </ul>
    </div>
    <div id="page-content-carrito">
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- content of page -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>