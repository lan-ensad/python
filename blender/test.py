import bpy

handle = object()
sub_particles = bpy.data.objects["Cube"].location

def notify_test(*args):
    print("Notify changed!", args)

bpy.msgbus.subscribe_rna(key=sub_particles, owner=handle, args=(), notify=notify_test,)
bpy.msgbus.publish_rna  (key=sub_particles )